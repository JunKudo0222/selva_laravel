@extends('layouts.index')　
<style>
    .topright{
        float:right;
    }
    .bottom-center{
        margin-top:50px;
        margin-left:auto;
        margin-right:auto;
    }
    .left{
        float:left;
    }
    .hidden{
        display:none;
    }
    .thumbnail{
        width:100px;
        height:100px;
    }
    .selectleft{
        float:left;
        width:50%
    }
    .selectright{
        float:right;
        width:50%
    }
    .search{
        border:1px solid black;
    }
    .categorysearch{
        
        width:30%;
        margin:auto;
        
    }
    .text{
        background:transparent;
        border:none;
    }
    
</style>
@auth
<div class="topbar">
<div class="col-md-2 topright">
           <a href="{{ route('posts.create') }}" class="btn btn-primary">新規商品登録</a>
</div>
</div>
@endauth
@section('content')
<div class="container">
    
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
               
                



            <form action="{{route('posts.search')}}" method="get" class="search">
					@csrf
                    <!DOCTYPE html>
                        <head>
                            <title>test</title>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                        </head>
                        <body>
                            <div class="categorysearch">
					            <div class="form-group">
                                    <div class="is-invalid">
                                            <select class=" parent selectleft" id="exampleFormControlSelect1" name="product_category" class="is-invalid" onchange="change();">
                                                
                                                
                                                @if(old('product_category')==!null&&1<=old('product_category')&&old('product_category')<=5)
                                                
                                                <option value="{{old('product_category')}}" selected>{{$product_categories->find(old('product_category'))->name}}</option>
                                                
                                                @else
                                                <option value="" selected>カテゴリ</option>
                                                @endif
                                            @foreach($product_categories as $product_category)
                                            <option value="{{ $product_category -> id }}" class="@error('product_category') is-invalid @enderror">{{ $product_category -> name }}</option>
                                            @endforeach
                                            
                                            
                                            
                                            </select>
                                            @error('product_category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="is-invalid">
                                        @if(old('product_subcategory')==!null)
                                        <input value="{{old('product_subcategory')}}" class="old" type="hidden" name="product_subcategory">
                                        @endif
                                        <select class="children selectright" id="exampleFormControlSelect1" name="product_subcategory" class="is-invalid">
                                            
                                            
                                            
                                        @if(old('product_subcategory')==!null&&1<=old('product_subcategory')&&old('product_subcategory')<=25)
                                        
                                        <option value="{{old('product_subcategory')}}" selected class="modori">{{$product_subcategories->find(old('product_subcategory'))->name}}</option>
                                        
                                        @else
                                        <option value="" selected>サブカテゴリ</option>
                                        @endif
                                        @foreach($product_subcategories as $product_subcategory)
                                        <option value="{{ $product_subcategory -> id }}" data-val="{{$product_subcategory->product_categories_id}}" class="@error('product_subcategory') is-invalid @enderror">{{ $product_subcategory -> name }}</option>
                                        @endforeach
                                        
                                            
                                        </select>
                                        @error('product_subcategory')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <input type="search" name="search" placeholder="キーワードを入力"><br>

                           @include('posts.income')
                            
                            


  					<input type="submit"  value="商品検索">
				</form>
				@isset($search_result)
				<div>
		
				
				<h3>
				{{$search_result}}
				</h3>
				</div>
				@endisset






            @foreach ($posts as $post)
                <div class="card-body">
                    
                    @isset($post->image1)
                    <img class="thumbnail" src="{{ url($post->image1) }}">
                    @endisset
                    <h5 class="card-title">
                        

                        
                            {{$product_categories->find($post->product_category)->name}}>{{$product_subcategories->find($post->product_subcategory)->name}}<br>
                            
                            <form action="{{ route('posts.show', $post->id) }}">
                                @if(isset($page))
                                <input type="hidden" name="page" value="{{$page}}">
                                @endif
                                <button type="submit" class="text">{{$post->name}}</button>
                            </form>
                            <br>
                            @for($i = 0; $i < ceil($comments->where('post_id',$post->id)->avg('evaluation')); $i++)<div class="hidden">{{$i}}</div>★@endfor
                            {{ceil($comments->where('post_id',$post->id)->avg('evaluation'))}}
                            
                        
                            <form action="{{ route('posts.show', $post->id) }}">
                                @if(isset($page))
                                <input type="hidden" name="page" value="{{$page}}">
                                @endif
                                <button type="submit" class="btn btn-primary">詳細</button>
                            </form>
                    </h5>

                </div>
                @endforeach
        </div>
        </div>
        
    </div>
</div>
<div class="mt-3">
    {{ $posts->appends(request()->input())->links('vendor/pagination/pagination_view3') }}
</div>
<div class="col-md-2 bottom-center">
                <a href="/" class="btn btn-primary">トップに戻る</a>
    </div>
    
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
                            
                           
                            
                        </body>
                       