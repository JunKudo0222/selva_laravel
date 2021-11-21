<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\Hankaku;

class AdminLoginController extends Controller
{
    private $formItems = ["user_id","password"];

    function showLoginForm(){
        
		return view('admin.admin_login');
	}
	
	function login(Request $request){
		//入力内容をチェックする
		$user_id = $request->input("user_id");
		$password = $request->input("password");
		//ログイン成功
		if($user_id == "hogehoge" && $password == "fugafuga"){
			$request->session()->put("admin_auth", true);
            
			return redirect()->route('admin.top');
		}
		$this->validator($request->all())->validate();
		$input = $request->only($this->formItems);
		//ログイン失敗
		return redirect()->route('admin.login')->withErrors([
			"login" => "ユーザーIDまたはパスワードが違います"
		])->withInput($input);
		
	}

	protected function validator(array $data)
    {
        return Validator::make($data, [
        
        'user_id' => ['required','max:10'],
        'password' => ['required','string', 'min:8','max:20',new Hankaku],
        
        ]);
        
    }
}
