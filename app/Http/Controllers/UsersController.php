<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Post;
use App\Product_category;
use App\Product_subcategory;
use Auth;
use App\Rules\Gender;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Rules\Hankaku;
use Illuminate\Support\Facades\Hash;
use App\Mail\ChangedMail;


class UsersController extends Controller
{
    private $form_show = 'UsersController@edit';
    private $form_confirm = 'UsersController@editconfirm';
    private $form_complete = 'UsersController@complete';

    private $formItems = ["id","name_sei","name_mei", "nickname","gender_id","password"];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth', ['except' => 'destroy']);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=Auth::id();
        $user=User::find($id);
        return view('users.mypage',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $user = Auth::user();
        $posts=Post::all();
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        
        if($request->has("password")){

            return view('users.editpassword', compact('user'));
        }
        elseif($request->has("email")){
            return view('users.editemail', compact('user'));
        }
        else{

            return view('users.edit', compact('user'));
        }
    }

    public function editreview($id)
    {
        $user = Auth::user();
        $posts=Post::all();
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        $comments=$user->load('comments');
            $comments=$comments['comments']->paginate(5)->onEachSide(1);
  
            return view('users.editreview', compact('user','comments','posts','product_categories','product_subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        if($request->has("password")){
            $this->validator($request->all())->validate();
            
            $request->session()->regenerateToken();
            
            
            $user=User::find($request->id);
            $user->password=Hash::make($request->password);
            $user->save();
        }
        elseif($request->has("email")){
            $this->validator($request->all())->validate();
            $user=Auth::user();
            $user->auth_code=substr(str_shuffle('1234567890'), 0, 6);
            $user->save();
            \Mail::to($request)->send(new ChangedMail($user));
            $request->session()->put("newemail", $request->email);
            return view('users.editemailconfirm',compact('user'));
        }
        elseif($request->has("auth_code")){
            $user=Auth::user();
            if($request->auth_code==$user->auth_code){
                $input = $request->session()->get("newemail");
                $user->email=$input;
                $user->save();
                return redirect()->route('users.show',$user->id);
            }
            else{
                $message="認証コードが違います";
                return view('users.editemailconfirm',compact('user','message'));
            }
            
        }
        else{

            $request->session()->regenerateToken();
            //セッションから値を取り出す
            $input = $request->session()->get("form_input");
            
            $user=User::find($input['id']);
            
            $user->name_sei=$input['name_sei'];
            $user->name_mei=$input['name_mei'];
            
            $user->gender_id=$input['gender_id'];
            
            $user->nickname=$input['nickname'];
            
            $user->save();
        }
            
            
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($id==Auth::id()){

            $user->delete();
            return redirect('/');
        }
        else{
            $user->delete();
            return redirect()->route('members.userlist');
        }

    }
    
    public function delete_confirm()
    {
        
        
        return view('users.delete_confirm');
    }


    public function post(Request $request)
    {
        $this->validator($request->all())->validate();
        
        
       
            $input = $request->only($this->formItems);
            
            
            // //セッションに書き込む
            $request->session()->put("form_input", $input);

            return view('users.edit_confirm', ["input" => $input]);
        
    }

    protected function validator(array $data)
    {
        
        if(isset($data['password1'])){
            

            return Validator::make($data, [
                
                'password' => ['required','string', 'min:8','max:20',new Hankaku, 'confirmed'],
                
            ]);
        }
        elseif(isset($data['email'])){
            return Validator::make($data, [
            'email' => 'required|string|email|max:200|unique:users,email,NULL,id,deleted_at,NULL',
            ]);
        }
        else{

            return Validator::make($data, [
                'name_sei' => ['required', 'string', 'max:20'],
                'name_mei' => ['required', 'string', 'max:20'],
                'gender_id' => ['required',new Gender],
                'nickname' => ['required', 'string', 'max:10'],
            
            ]);
        }

        }
    function registered(Request $request)
    {
        // return $this->showUserList();
        return redirect()->route('users.show',Auth::id());
    }

    public function review()
    {
        
        return view('users.review');
    }
}

