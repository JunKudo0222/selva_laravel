<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Product_category;
use App\Product_subcategory;
use App\Post;
use App\Comment;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $page=$request->input('page');
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        $posts=Post::orderBy('id','desc')->paginate(2)->onEachSide(1);
        $comments=Comment::all();
        
            return view('posts.index',compact('posts','comments','product_categories','product_subcategories','page'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        if($request->route==!null){
            $top=$request->route;
            return view('posts.create',compact('product_categories','product_subcategories','top'));
        }
        else{
            return view('posts.create',compact('product_categories','product_subcategories'));
        }
    }

    public function test(Request $request){

        
        //アップロードパスを指定する。(/storage/upload)
        // $upload_file_path = storage_path().'/upload/';
        $upload_file_path = storage_path().'/app/public/';
        
        // アップロードファイルを受け取る。
        
        //ファイルを格納する。
        if($request->file('file1')==!null){
        $request->file('file1')->move($upload_file_path ,"image1.jpeg");
        return view('image1');
        } 
        

        if($request->file('file2')==!null){
        $request->file('file2')->move($upload_file_path ,"image2.jpeg");
        return view('image2');
        }

        if($request->file('file3')==!null){
        $request->file('file3')->move($upload_file_path ,"image3.jpeg");
        return view('image3');
        }  

        if($request->file('file4')==!null){      
        $request->file('file4')->move($upload_file_path ,"image4.jpeg");
        return view('image4');
        }   
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
        $input = $request->only('name','product_category','product_subcategory','product_content','image1','image2','image3','image4');
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
        if($request->image1==!null){
            $post -> image1    = "storage/".$post->id."image1.jpeg";
        }
        if($request->image2==!null){
            $post -> image2    = "storage/".$post->id."image2.jpeg";
        }
        if($request->image3==!null){
            $post -> image3    = "storage/".$post->id."image3.jpeg";
        }
        if($request->image4==!null){
            $post -> image4    = "storage/".$post->id."image4.jpeg";
        }
        
        
        $post -> save(); //保存してあげましょう
        if($post->image1==!null){
            rename('storage/image1.jpeg', $post->image1);
        }
        if($post->image2==!null){
            rename('storage/image2.jpeg', $post->image2);
        }
        if($post->image3==!null){
            rename('storage/image3.jpeg', $post->image3);
        }
        if($post->image4==!null){
            rename('storage/image4.jpeg', $post->image4);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        
        $page=$request->page;

        $product_category=Product_category::all();
        $product_subcategory=Product_subcategory::all();
        $post = Post::find($id);
        
        $post->load('comments');
        
                
                
            $comments=$post->comments;
            // ->paginate(5);
            
            return view('posts.show', compact('post','comments','product_category','product_subcategory','page'));
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
        // dd($request);
        $post = new Post; //インスタンスを作成
        $post -> name    = $request -> name; //ユーザー入力のnameを代入
        if($request->image1==!null){
            $post -> image1    = $request -> image1; //ユーザー入力のimage1を代入
        }
        if($request->image2==!null){
            $post -> image2    = $request -> image2; //ユーザー入力のimage2を代入
        }
        if($request->image3==!null){
            $post -> image3    = $request -> image3; //ユーザー入力のimage3を代入
        }
        if($request->image4==!null){
            $post -> image4    = $request -> image4; //ユーザー入力のimage4を代入
        }
        
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
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        $comments=Comment::all();

        if(isset($request->product_category)){
            
            $query->where('posts.product_category', $request->product_category);
            
            
        }
        if(isset($request->product_subcategory)){
            
            $query->where('posts.product_subcategory', $request->product_subcategory);
            
            
        }
        if(isset($request->search)){
            $query->where('name','like','%'.$request->search.'%')
            ->orWhere('product_content','like','%'.$request->search.'%');
        }

         $posts = $query->get()->paginate(10)->onEachSide(1);

        $search_result = $request->search.'の検索結果'.$posts->count().'件';

        return view('posts.index',compact('posts','comments','search_result','product_categories','product_subcategories'));    
    }
}
