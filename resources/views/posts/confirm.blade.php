@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<h1>商品登録確認画面</h1><br>

<form action="{{ route('posts.store') }}" method="POST">
{{csrf_field()}}
        <div class="md-form">
            <label for="name">商品名</label>
            {{ $post->name }}
            <input class="form-control" type="hidden" id="name" name="name" required value="{{ $post->name }}">
        </div>
        <div class="md-form">
            <label for="product_category">商品大カテゴリー</label>
            {{ $product_category->name }}
            <input class="form-control" type="hidden" id="product_category" name="product_category" required value="{{ $post->product_category }}">
        </div>
        <div class="md-form">
            <label for="product_subcategory">商品小カテゴリー</label>
            {{ $product_subcategory->name }}
            <input class="form-control" type="hidden" id="product_subcategory" name="product_subcategory" required value="{{ $post->product_subcategory }}">
        </div>


        <div class="md-form">
            <label for="product_content">商品説明</label>
            {{ $post->product_content }}
            <input class="form-control" type="hidden" id="product_content" name="product_content" required value="{{ $post->product_content }}">
        </div>
        <button type="submit" class="btn btn-primary">商品を登録する</button><br><br>
        <button type="submit" class="btn btn-primary" name="back">前に戻る</button>
</form>
</div>
</div>
</div>
@endsection

