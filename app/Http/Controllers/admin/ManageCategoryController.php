<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Product_category;
use App\Product_subcategory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Registerscategories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Hankaku;
use App\Rules\Gender;


class ManageCategoryController extends Controller
{
    function showCategoryList(Request $request){
        if(isset($request->sort)){

            $category_list = Product_category::orderBy('id','asc')->paginate(10)->onEachSide(1);
            // dd($category_list);
            $sort='asc';
            return view("admin.category_list", [
                "category_list" => $category_list
            ],compact('sort'));
        }
        else{
            $category_list = Product_category::orderBy('id','desc')->paginate(10)->onEachSide(1);
            // dd($category_list);
            
            return view("admin.category_list", [
                "category_list" => $category_list
            ]);

        }
	}


    function showCategoryDetail($id){
		$category = Product_category::find($id);
        $subcategories=Product_subcategory::all()->where('product_categories_id',$id);
        
		return view("admin.category_detail",compact('category','subcategories'));
	}
    function search(Request $request){
        
        $query = Product_category::query();
        // dd($request->gender_id);
        if(isset($request->id)){
            $query->where('categories.id',$request->id);

        }
        
        
        
        if(isset($request->search)){
            $query->where('name','like','%'.$request->search.'%');
            
            
        }
        // dd(Product_category::query()->get());
        
        
        $category_list = $query->get()->paginate(10)->onEachSide(1);
        // dd($category_list);

        $search_result = $request->search.'の検索結果'.$query->get()->count().'件';
    

        return view('admin.category_list',[
			"category_list" => $category_list
		],compact('search_result'));    

    }


    
    public function edit($id)
    {
        $category = Product_category::find($id);
        
        return view('admin.category_edit', compact('category'));
    }

    public function showRegistrationForm()
    {
        return view('admin.category_edit');
    }
}

//register_show
//Search
//categorylist
//Detail
//Edit