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
<h1 class="detailbar"> 商品レビュー詳細</h1>
    <div class="right">
        <a href="{{ route('reviews.reviewlist') }}" class="btn btn-primary">一覧へ戻る</a>
    </div>
</div>
@section('content')
<div class="container">
		<br>
		<br>
		<br>
		<br>

			<ul class="list-group">
            <img class="thumbnail" src="{{ url($product->image1) }}">
                <img class="thumbnail" src="{{ url($product->image2) }}">
                <img class="thumbnail" src="{{ url($product->image3) }}">
                <img class="thumbnail" src="{{ url($product->image4) }}">
				<li class="list-group-item">商品ID: {{ $product->id }}</li>
				<li class="list-group-item">{{ $product->name }}</li>
				<li class="list-group-item">総合評価:総合評価 @for($i = 0; $i < ceil($comments->where('post_id',$product->id)->avg('evaluation')); $i++)<div class="hidden">{{$i}}</div>★@endfor
                {{ceil($comments->where('post_id',$product->id)->avg('evaluation'))}}</li>
                <br>
				<li class="list-group-item">ID:{{ $review->id }}</li>
				<li class="list-group-item">商品評価:{{ $review->evaluation }}</li>
				<li class="list-group-item">商品コメント:{{ $review->body }}</li>
			</ul>
		
	
</div>
<div class="select">

    <a href="{{ route('comments.edit',$review->id) }}" class="btn btn-primary left">編集</a>
    

    
    
    <form action="{{route('reviews.destroy',$review->id)}}" class="left" method="POST" >
    @csrf
<input name="_method" type="hidden" value="DELETE" >
<input type="submit"  value="削除" class="btn btn-danger">
</form>
</div>
@endsection

