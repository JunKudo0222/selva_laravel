@extends('layouts.admin')

<style>
    .detailbar{
        float:left;
        margin:20;
    }
    .right{
        float:right;
        margin:20;
    }
    .left{
        float:left;
        margin:20;
    }
    .bg{
        background-color:pink;
        height:100px;
        width:100%;
        padding:0;
        margin:0;
    }
    
    .select{
        
        width:20%;
        
        margin-left:auto;
        margin-right:auto;
        margin-top:50px;
    }
    .thumbnail{
        width:100px;
        height:100px;
    }
    .hidden{
        display:none;
    }
    
</style>
<div class="bg">
<h1 class="detailbar"> 商品詳細</h1>
    <div class="right">
        <a href="{{ route('products.productlist') }}" class="btn btn-primary">一覧へ戻る</a>
    </div>
</div>
@section('content')
<div class="container">
		<br>
		<br>
		<br>
		<br>

			<ul class="list-group">
				<li class="list-group-item">ID: {{ $product->id }}</li>
				<li class="list-group-item">商品名: {{ $product->name }}</li>
				<li class="list-group-item">商品カテゴリ: {{ $product_category->name }}>{{ $product_subcategory->name }}</li>
                <img class="thumbnail" src="{{ url($product->image1) }}">
                <img class="thumbnail" src="{{ url($product->image2) }}">
                <img class="thumbnail" src="{{ url($product->image3) }}">
                <img class="thumbnail" src="{{ url($product->image4) }}">
				<li class="list-group-item">商品説明: {{ $product->product_content}}</li>
				<li class="list-group-item">総合評価: @for($i = 0; $i < ceil($comments->avg('evaluation')); $i++)<div class="hidden">{{$i}}</div>★@endfor
                {{ceil($comments->avg('evaluation'))}}</li>
                <br>
                @foreach($comments as $comment)
				<li class="list-group-item">商品レビューID: {{ $comment->id}}</li>
				<li class="list-group-item">{{ $comment->user_id}}さん</li>
				<li class="list-group-item">@for($i = 0; $i < $comment->evaluation; $i++)<div class="hidden">{{$i}}</div>★@endfor{{ $comment->evaluation }}</li>
				<li class="list-group-item">商品コメント: {{ $comment->body}}</li>
				<a href="{{ route('reviews.detail',$comment->id) }}" class="btn btn-primary left">商品レビュー詳細</a>
                @endforeach
                
			</ul>
		
	
</div>
<div class="select">

    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary left">編集</a>
    

    
    
    <form action="{{route('products.destroy',$product->id)}}" class="left" method="POST" >
    @csrf
<input name="_method" type="hidden" value="DELETE" >
<input type="submit"  value="削除" class="btn btn-danger">
</form>
</div>
@endsection

