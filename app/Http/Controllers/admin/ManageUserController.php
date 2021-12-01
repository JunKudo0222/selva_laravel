<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Hankaku;
use App\Rules\Gender;

class ManageUserController extends Controller
{
    private $form_show = 'admin\ManageUserController@edit';
    private $form_confirm = 'admin\ManageUserController@editconfirm';
    private $form_complete = 'admin\ManageUserController@complete';

    private $formItems = ["id","name_sei","name_mei", "email", "password","gender_id","nickname"];




    function showUserList(Request $request){
        if(isset($request->sort)){

            $user_list = User::orderBy('id','asc')->paginate(10)->onEachSide(1);
            // dd($user_list);
            $sort='asc';
            return view("admin.user_list", [
                "user_list" => $user_list
            ],compact('sort'));
        }
        else{
            $user_list = User::orderBy('id','desc')->paginate(10)->onEachSide(1);
            // dd($user_list);
            
            return view("admin.user_list", [
                "user_list" => $user_list
            ]);

        }
	}
	function showUserDetail($id){
		$user = User::find($id);
		return view("admin.user_detail",compact('user'));
	}
    function search(Request $request){
        
        $query = User::query();
        // dd($request->gender_id);
        if(isset($request->search)){
            $query->where('name_sei','like','%'.$request->search.'%')
            ->orWhere('name_mei','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%');
            
        }
        if(isset($request->id)){
            $query->where('users.id',$request->id);
            

        }
        
        if(isset($request->gender_id1)&&$request->gender_id2==null){
            
            $query->where('users.gender_id', 1);
            
        }
        if(isset($request->gender_id2)&&$request->gender_id1==null){
            
            $query->where('users.gender_id', 2);
            
        }
        // dd($query);
        // dd(User::query()->get());
        
        
        $user_list = $query->get()->sortByDesc('id')->paginate(10)->onEachSide(1);
        // dd($user_list);

        $search_result = $request->search.'の検索結果'.$query->get()->count().'件';
    

        return view('admin.user_list',[
			"user_list" => $user_list
		],compact('search_result'));    

    }


    
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('admin.user_edit', compact('user'));
    }

    /*
     * 入力から確認へ遷移する際の処理
     */
    function post(Request $request)
    {
        
        
        $this->validator($request->all())->validate();
        
        $input = $request->only($this->formItems);
        
        
        
        // //セッションに書き込む
        $request->session()->put("form_input", $input);
        // $id=$input['id'];

        return view('admin.user_edit_confirm', ["input" => $input]);
        
        
        
    }


    protected function validator(array $data)
    {
        if(isset($data['id'])){
        $user=User::find($data['id']);
        if($user->email==$data['email']){
            
            
            return Validator::make($data, [
                
                'name_sei' => ['required', 'string', 'max:20'],
                'name_mei' => ['required', 'string', 'max:20'],
                'gender_id' => ['required',new Gender],
                'nickname' => ['nullable','string','max:10' ],
                'password' => ['nullable','string', 'min:8','max:20',new Hankaku, 'confirmed'],
                
                
                
            ]);
        }
        else{
            return Validator::make($data, [
            'name_sei' => ['required', 'string', 'max:20'],
            'name_mei' => ['required', 'string', 'max:20'],
            'gender_id' => ['required',new Gender],
            'nickname' => ['nullable','string','max:10' ],
            'password' => ['nullable','string', 'min:8','max:20',new Hankaku, 'confirmed'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email' => 'required|string|email|max:200|unique:users,email,NULL,id,deleted_at,NULL',
        ]);
        }}
        else{
            return Validator::make($data, [
                'name_sei' => ['required', 'string', 'max:20'],
                'name_mei' => ['required', 'string', 'max:20'],
                'gender_id' => ['required',new Gender],
                'nickname' => ['nullable','string','max:10' ],
                'password' => ['required','string', 'min:8','max:20',new Hankaku, 'confirmed'],
                // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'email' => 'required|string|email|max:200|unique:users,email,NULL,id,deleted_at,NULL',
            ]);

        }
        
        // return view('posts.confirm');
    }
    

    public function update(Request $request)
    {
        $request->session()->regenerateToken();
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
        
        $user=User::find($input['id']);
        
        $user->name_sei=$input['name_sei'];
        $user->name_mei=$input['name_mei'];
        $user->email=$input['email'];
        if($input['password']==!null){

            $user->password=Hash::make($input['password']);
        }
        $user->gender_id=$input['gender_id'];
        $user->nickname=$input['nickname'];
        
        $user->save();
        
        
        //セッションに値が無い時はフォームに戻る
        // if (!$input) {
        //     return redirect()->action($this->form_show);
        // }

        
        // $this->validator($request->all())->validate();
        
        // event(new Registered($user = $this->create($request->all())));

        //セッションを空にする
        $request->session()->forget('form_input');
        
        
        // 登録データーでログイン
        // $this->guard()->login($user, true);

        return $this->registered($request);
        

    }

    function registered(Request $request)
    {
        // return $this->showUserList();
        return redirect()->route('members.userlist');
    }

    public function showRegistrationForm()
    {
        return view('admin.user_edit');
    }

    public function register(Request $request)
    {
        $request->session()->regenerateToken();
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
        
        
        // $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($input)));

        //セッションを空にする
        $request->session()->forget("form_input");
        return redirect()->route('members.userlist');
           
    }
    protected function create(array $data)
    {
        
        
        return User::create([
            'name_sei' => $data['name_sei'],
            'name_mei' => $data['name_mei'],
            'gender_id' => $data['gender_id'],
            'nickname' => $data['nickname'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
        ]);
    }


    
}
