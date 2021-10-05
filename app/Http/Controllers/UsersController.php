<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Rules\Gender;


class UsersController extends Controller
{
    private $form_show = 'UsersController@edit';
    private $form_confirm = 'UsersController@editconfirm';
    private $form_complete = 'UsersController@complete';

    private $formItems = ["id","name_sei","name_mei", "nickname","gender_id"];


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
    public function edit($id)
    {
        $user = User::find($id);
        
        
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            return redirect()->route('users.userlist');
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
        
        return Validator::make($data, [
            'name_sei' => ['required', 'string', 'max:20'],
            'name_mei' => ['required', 'string', 'max:20'],
            'gender_id' => ['required',new Gender],
            'nickname' => ['required', 'string', 'max:20'],
            
        ]);

        }
}

