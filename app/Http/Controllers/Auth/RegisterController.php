<?php

namespace App\Http\Controllers\Auth;


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
use App\Mail\RegisteredMail;


class RegisterController extends Controller
{
    private $form_show = 'Auth\RegisterController@showRegistrationForm';
    private $form_confirm = 'Auth\RegisterController@confirm';
    private $form_complete = 'Auth\RegisterController@complete';

    private $formItems = ["name_sei","name_mei", "email", "password","nickname","gender_id"];

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'complete']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            
            'name_sei' => ['required', 'string', 'max:20'],
            'name_mei' => ['required', 'string', 'max:20'],
            'gender_id' => ['required',new Gender],
            'nickname' => ['required','string','max:10' ],
            'password' => ['required','string', 'min:8','max:20',new Hankaku, 'confirmed'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email' => 'required|string|email|max:200|unique:users,email,NULL,id,deleted_at,NULL',
        ]);
        // return view('posts.confirm');
    }

    
        
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
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

    /*
     * ?????????????????????????????????????????????
     */
    function post(Request $request)
    {
        // dd($request);
        $this->validator($request->all())->validate();

        $input = $request->only($this->formItems);
        

        //??????????????????????????????
        $request->session()->put("form_input", $input);
        
        return redirect()->action($this->form_confirm);
    }

    /**
     * ????????????
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //???????????????????????????????????????
        $input = $request->session()->get("form_input");
        
        // ???????????????
        if ($request->has("back")) {
            // dd($request);
            return redirect()->action($this->form_show)
            ->withInput($input);
        }
        
        
        //?????????????????????????????????????????????????????????
        if (!$input) {
            return redirect()->action($this->form_show);
        }

        
        // $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all())));

        //??????????????????????????????
        $request->session()->forget("form_input");

        // ?????????????????????????????????
        $this->guard()->login($user, true);
        \Mail::to($user)->send(new RegisteredMail($user));

        return $this->registered($request, $user)
            ?  : redirect($this->redirectPath());
           
    }

    /*
     * ???????????????
     */
    function registered(Request $request, $user)
    {
        return redirect()->action($this->form_complete);
    }

    /**
     * ????????????????????????????????????
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register.register');
    }

    /*
     * ??????????????????
     */
    public function confirm(Request $request)
    {
        
        //???????????????????????????????????????
        $input = $request->session()->get("form_input");
        
        
        //?????????????????????????????????????????????????????????
        if (!$input) {
            return redirect()->action("Auth\RegisterController");
        }
        
        
        return view('auth.register.confirm', ["input" => $input]);
    }

    /*
     * ??????????????????
     */
    public function complete()
    {
        return view('auth.register.complete');
    }

    
}
