<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post=Post::find($request->id);
        $comments=$post->load('comments');
        $comments=$comments['comments'];
        
        return view('comments.index',compact('comments','post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $id=(int)$request->id;
        $post=Post::find($id);
        return view('comments.create',compact('id','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $post = Post::find($request->post_id);  //まず該当の投稿を探す
        $comment = new Comment;              //commentのインスタンスを作成
        $comment -> body    = $request -> body;
        $comment -> user_id = Auth::id();
        $comment -> post_id = $request -> post_id;
        $comment -> save();
        $comments=$post->comments;
        $id=$post->id;

        return redirect()->route('posts.show',[
            'post_id' => $id,
        ]);
        // return view('posts.show', compact('post','comments'));  //リターン先は該当の投稿詳細ページ
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
