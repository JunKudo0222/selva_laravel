<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;
use App\User;
use App\Product_category;
use App\Product_subcategory;
use Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    private $formItems = ["evaluation","body","comment_id","post_id"];
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
        $product_category=Product_category::all();
        $product_subcategory=Product_subcategory::all();
        $user=User::all();
        $post=Post::find($request->id);
        $comments=$post->load('comments');
        $evaluations=$comments->toArray();
        $evaluations=$evaluations['comments'];
        $evaluations=array_column($evaluations,'evaluation');
        $evaluations=ceil(array_sum($evaluations)/count($evaluations));
        $comments=$comments['comments']->paginate(5)->onEachSide(1);
        
        
        return view('comments.index',compact('comments','post','user','product_category','product_subcategory','evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if($request->session()->get('_old_input')==!null){
            $input=$request->session()->get('_old_input');
            $id=$input['post_id'];
            $post=Post::find($id);

            return view('comments.create',compact('id','post'));
        } 
        else{

            $id=(int)$request->id;
            $post=Post::find($id);
            return view('comments.create',compact('id','post'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        
        $post=Post::find($request->post_id);
        $id=$request->post_id;
        
        $request->session()->regenerateToken();
        $input = $request->only('body','evaluation','post_id');
        $request->session()->put("form_input", $input);
        //???????????????????????????????????????
        $input = $request->session()->get("form_input");
        if ($request->has("back")) {
            // dd($input);
            // dd($request);
            
            
            return redirect()->route('comments.create')->withInput($input);
        }
        $post = Post::find($request->post_id);  //??????????????????????????????
        $comment = new Comment;              //comment??????????????????????????????
        $comment -> body    = $request -> body;
        $comment -> user_id = Auth::id();
        $comment -> post_id = $request -> post_id;
        $comment -> evaluation = $request -> evaluation;
        $comment -> save();
        $comments=$post->comments;
        $id=$post->id;
        return view('comments.complete',compact('id'));

        // return redirect()->route('posts.show',[
        //     'post_id' => $id,
        // ]);
        // return view('posts.show', compact('post','comments'));  //????????????????????????????????????????????????
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
        $comment=Comment::find($id);
        $post=Post::find($comment->post_id);
        
        return view('users.updatereview',compact('comment','post'));
    }

    public function editconfirm(CommentRequest $request)
    {
        
        $comment=Comment::find($request->comment_id);
        $post=Post::find($request->post_id);
        $this->validator($request->all())->validate();
        $input = $request->only($this->formItems);
        
    
        // //??????????????????????????????
        $request->session()->put("form_input", $input);
        // $id=$input['id'];

        return view('users.updatereviewconfirm', ["input" => $input,'post'=>$post]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->session()->regenerateToken();
        //???????????????????????????????????????
        $input = $request->session()->get("form_input");
        
        $comment=Comment::find($input['comment_id']);
        $comment->evaluation=$input['evaluation'];
        $comment->body=$input['body'];
        $comment->save();
        $user=Auth::user();
        $comments=$user->load('comments');
        $comments=$comments['comments']->paginate(5)->onEachSide(1);
        $posts=Post::all();
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        return view('users.editreview', compact('user','comments','posts','product_categories','product_subcategories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyconfirm($id)
    {
        
        $comment=Comment::find($id);
        $post=Post::find($comment->post_id);
        $comments=$post->load('comments');
        $comments=$comments['comments'];
        return view('users.deletereview',compact('comment','post','comments'));
    }

    public function destroy($id)
    {
        
        $comment = Comment::find($id);
        
        if(Auth::id() !== $comment->user_id){
            return abort(404);
        }
        $comment -> delete();
        

        $user = Auth::user();
        $posts=Post::all();
        $product_categories=Product_category::all();
        $product_subcategories=Product_subcategory::all();
        $comments=$user->load('comments');
            $comments=$comments['comments']->paginate(5)->onEachSide(1);
            

            return view('users.editreview', compact('user','comments','posts','product_categories','product_subcategories'));
    }

    public function confirm(CommentRequest $request)
    {   
        

        
    
        $post=Post::find($request->post_id);
        $comment = new Comment; //???????????????????????????
        $comment -> body    = $request -> body; //?????????????????????name?????????
        $comment -> user_id  = Auth::id(); //??????????????????????????????id?????????
        $comment -> post_id  = $request->post_id; //??????????????????????????????id?????????
        $comment -> evaluation  = $request->evaluation; //??????????????????????????????id?????????
        
        return view('comments.confirm',compact('comment','post'));
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
        
        'evaluation' => ['required', 'between:1,5','integer'],
        'body' => ['required', 'string', 'max:200'],
        
        ]);
        
    }
}
