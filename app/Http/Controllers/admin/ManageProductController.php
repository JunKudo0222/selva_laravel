<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Post;
use App\Comment;
use App\Product_category;
use App\Product_subcategory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Registerscategories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Hankaku;
use App\Rules\Gender;


class ManageProductController extends Controller
{
    function showProductList(Request $request){
        if(isset($request->sort)){

            $product_list = Post::orderBy('id','asc')->paginate(10)->onEachSide(1);
            // dd($product_list);
            $sort='asc';
            return view("admin.product_list", [
                "product_list" => $product_list
            ],compact('sort'));
        }
        else{
            $product_list = Post::orderBy('id','desc')->paginate(10)->onEachSide(1);
            // dd($product_list);
            
            return view("admin.product_list", [
                "product_list" => $product_list
            ]);

        }
	}


    function showProductDetail($id){
		$product = Post::find($id);
		$comments = Comment::all()->where('post_id',$id);
        $product_category=Product_category::all()->where('id',$product->product_category)->first();
        $product_subcategory=Product_subcategory::all()->where('id',$product->product_subcategory)->first();
        

        
		return view("admin.product_detail",compact('product','comments','product_category','product_subcategory'));
	}
    function search(Request $request){
        
        $query = Post::query();
        // dd($request->gender_id);
        if(isset($request->id)){
            $query->where('categories.id',$request->id);

        }
        
        
        
        if(isset($request->search)){
            $query->where('name','like','%'.$request->search.'%');
            
            
        }
        // dd(Post::query()->get());
        
        
        $product_list = $query->get()->paginate(10)->onEachSide(1);
        // dd($product_list);

        $search_result = $request->search.'の検索結果'.$query->get()->count().'件';
    

        return view('admin.product_list',[
			"product_list" => $product_list
		],compact('search_result'));    

    }


    
    public function edit($id)
    {
        $product = Post::find($id);
        
        return view('admin.product_edit', compact('product'));
    }

    public function showRegistrationForm()
    {
        return view('admin.product_edit');
    }
}

//register_show
//Search
//productlist
//Detail
//Edit