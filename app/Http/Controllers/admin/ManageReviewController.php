<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Comment;
use App\Post;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Registerscategories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Hankaku;
use App\Rules\Gender;


class ManageReviewController extends Controller
{
    function showReviewList(Request $request){
        if(isset($request->sort)){

            $review_list = Comment::orderBy('id','asc')->paginate(10)->onEachSide(1);
            // dd($review_list);
            $sort='asc';
            return view("admin.review_list", [
                "review_list" => $review_list
            ],compact('sort'));
        }
        else{
            $review_list = Comment::orderBy('id','desc')->paginate(10)->onEachSide(1);
            // dd($review_list);
            
            return view("admin.review_list", [
                "review_list" => $review_list
            ]);

        }
	}


    function showReviewDetail($id){
		$review = Comment::find($id);
        $product=Post::all()->where('id',$review->post_id)->first();
        $comments=$product->load('comments');
        $comments=$comments['comments'];
        
        
		return view("admin.review_detail",compact('review','product','comments'));
	}
    function search(Request $request){
        
        $query = Comment::query();
        // dd($request->gender_id);
        if(isset($request->id)){
            $query->where('categories.id',$request->id);

        }
        
        
        
        if(isset($request->search)){
            $query->where('name','like','%'.$request->search.'%');
            
            
        }
        // dd(Comment::query()->get());
        
        
        $review_list = $query->get()->paginate(10)->onEachSide(1);
        // dd($review_list);

        $search_result = $request->search.'の検索結果'.$query->get()->count().'件';
    

        return view('admin.review_list',[
			"review_list" => $review_list
		],compact('search_result'));    

    }


    
    public function edit($id)
    {
        $review = Comment::find($id);
        
        return view('admin.review_edit', compact('review'));
    }

    public function showRegistrationForm()
    {
        return view('admin.review_edit');
    }
}

//register_show
//Search
//reviewlist
//Detail
//Edit