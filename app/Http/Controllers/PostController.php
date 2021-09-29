<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Product_category;
use App\Product_subcategory;
use App\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        return view('posts.create',compact('product_categories','product_subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        
        $request->session()->regenerateToken();
        $input = $request->only('name','product_category','product_subcategory','product_content');
        $request->session()->put("form_input", $input);
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
        if ($request->has("back")) {
            // dd($input);
            // dd($request);
            return redirect()->route('posts.create')->withInput($input);
        }
        $post = new Post; //インスタンスを作成
        $post -> name    = $request -> name; //ユーザー入力のnameを代入
        $post -> product_category    = $request -> product_category; //ユーザー入力のnameを代入
        $post -> product_subcategory    = $request -> product_subcategory; //ユーザー入力のnameを代入
        $post -> product_content     = $request -> product_content; //ユーザー入力のproduct_contentを代入
        $post -> user_id  = Auth::id(); //ログイン中のユーザーidを代入
        $post -> save(); //保存してあげましょう
        
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $post->load('comments');
        
                
                
            $comments=$post->comments;
            // ->paginate(5);
            
            
            return view('posts.show', compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function confirm(PostRequest $request)
    {
        $post = new Post; //インスタンスを作成
        $post -> name    = $request -> name; //ユーザー入力のnameを代入
        $post -> product_category    = $request -> product_category; //ユーザー入力のnameを代入
        $post -> product_subcategory    = $request -> product_subcategory; //ユーザー入力のnameを代入
        $post -> product_content     = $request -> product_content; //ユーザー入力のproduct_contentを代入
        $post -> user_id  = Auth::id(); //ログイン中のユーザーidを代入
        $product_category=Product_category::find($post->product_category);
        $product_subcategory=Product_subcategory::find($post->product_subcategory);

        return view('posts.confirm',compact('post','product_category','product_subcategory'));
    }

    public function search(Request $request)
    {                
        $query = Post::query();

        if(isset($request->search)){
            $query->where('name','like','%'.$request->search.'%')
            ->orWhere('product_content','like','%'.$request->search.'%');
        }

         $posts = $query->get();

        $search_result = $request->search.'の検索結果'.$posts->count().'件';

        return view('posts.index',compact('posts','search_result'));    
    }
}
