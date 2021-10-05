<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function test(Request $request){
        
                
        //アップロードパスを指定する。(/storage/upload)
        // $upload_file_path = storage_path().'/upload/';
        $upload_file_path = storage_path().'/app/public/';
        
        // アップロードファイルを受け取る。
        $result = $request->file('file1')->isValid();  
        if($result){  
            //ファイルを格納する。
             $request->file('file1')->move($upload_file_path ,"image1.jpeg");
             $request->file('file2')->move($upload_file_path ,"image2.jpeg");
             $request->file('file3')->move($upload_file_path ,"image3.jpeg");
             $request->file('file4')->move($upload_file_path ,"image4.jpeg");
        }
        
        
        //テキストの内容を付与してhtml(test.blade.php)を返却する。
        return view('test');
        
    }
}
