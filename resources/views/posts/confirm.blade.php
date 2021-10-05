@extends('layouts.app')
<style>
    .thumbnail{
        width:100px;
        height:100px;
    }
</style>
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
            <label for="image1">画像1</label>
            <img class="thumbnail" src="{{ url('storage/image1.jpeg') }}">
            <input class="form-control" type="hidden" id="image1" name="image1" required value="{{ $post->image1 }}">
            <label for="image2">画像2</label>
            <img class="thumbnail" src="{{ url('storage/image2.jpeg') }}">
            <input class="form-control" type="hidden" id="image2" name="image2" required value="{{ $post->image2 }}">
            <label for="image3">画像3</label>
            <img class="thumbnail" src="{{ url('storage/image3.jpeg') }}">
            <input class="form-control" type="hidden" id="image3" name="image3" required value="{{ $post->image3 }}">
            <label for="image4">画像4</label>
            <img class="thumbnail" src="{{ url('storage/image4.jpeg') }}">
            <input class="form-control" type="hidden" id="image4" name="image4" required value="{{ $post->image4 }}">
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

