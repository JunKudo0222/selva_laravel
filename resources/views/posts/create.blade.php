@extends('layouts.app')
<style>
    .thumbnail{
        width:100px;
        height:100px;
    }
    .hidden{
        display:none;
    }
    
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if ($errors->any()) //追加
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>商品登録</h1>
            <form action="{{ route('posts.confirm') }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label>商品名</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" >
                </div>
                
                <!DOCTYPE html>
<head>
                            <title>test</title>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                        </head>
                        <body>





<div class="form-group">
          <label for="exampleFormControlSelect1">商品大カテゴリー</label>
          <div class="is-invalid">
            <select class="form-control parent" id="exampleFormControlSelect1" name="product_category" class="is-invalid" onchange="change();">
                
                
                @if(old('product_category')==!null&&1<=old('product_category')&&old('product_category')<=5)
                
                <option value="{{old('product_category')}}" selected>{{$product_categories->find(old('product_category'))->name}}</option>
                
                @else
                <option value="" selected>選択してください</option>
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
          <label for="exampleFormControlSelect1">商品小カテゴリー</label>
          <div class="is-invalid">
            <select class="form-control children" id="exampleFormControlSelect1" name="product_subcategory" class="is-invalid">
                
                
                @if(old('product_subcategory')==!null&&1<=old('product_subcategory')&&old('product_subcategory')<=25)
                
                <option value="{{old('product_subcategory')}}" selected>{{$product_subcategories->find(old('product_subcategory'))->name}}</option>
                
                @else
                <option value="" selected>選択してください</option>
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
                            
                



<div class="form-group">
          <label for="exampleFormControlSelect1">商品写真</label><br>

          <!-- サーバへ送信する内容を入力する。 -->
          
                            
                            写真1：<input type="file" id="file1" name="file"  onchange="handleFileSelect1();"><br/>
                            写真2：<input type="file" id="file2" name="file" accept="image/jpeg, image/png, image/jpg, image/gif" onchange="handleFileSelect2();"><br/>
                            写真3：<input type="file" id="file3" name="file" accept="image/jpeg, image/png, image/jpg, image/gif" onchange="handleFileSelect3();"><br/>
                            写真4：<input type="file" id="file4" name="file" accept="image/jpeg, image/png, image/jpg, image/gif" onchange="handleFileSelect4();"><br/>
                            <button type="button" onclick="send();">アップロード</button>
                            
                            

                            <!-- JavaScripts -->

                        <!-- サーバから受けた内容を表示する。 -->
                        <div id="main">
                                </div>
                        <div id="target">
                                </div>
</div>

                        

  
                        

                <div class="form-group">
                    <label>商品説明</label>
                    <textarea class="form-control"  rows="5" name="product_content" value="{{old('product_content')}}">{{ old('product_content') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">確認画面へ</button><br><br>
                <a href="/" class="btn btn-primary">{{ __('トップへ戻る') }}</a>
            </form>
        </div>
    </div>
</div>





                    
                            
                            
                            
                            @endsection
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
                            <script src="{{ url('test.js') }}"></script>        
                        </body>