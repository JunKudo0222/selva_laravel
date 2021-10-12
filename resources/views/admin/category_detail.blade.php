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
    
    
</style>
<div class="bg">
<h1 class="detailbar"> 商品カテゴリ詳細</h1>
    <div class="right">
        <a href="{{ route('categories.categorylist') }}" class="btn btn-primary">一覧へ戻る</a>
    </div>
</div>
@section('content')
<div class="container">
		<br>
		<br>
		<br>
		<br>

			<ul class="list-group">
				<li class="list-group-item">ID: {{ $category->id }}</li>
				<li class="list-group-item">商品大カテゴリ: {{ $category->name }}</li>
                商品小カテゴリ
                @foreach($subcategories as $subcategory)
				<li class="list-group-item">{{ $subcategory->name }}</li>
				@endforeach
			</ul>
		
	
</div>
<div class="select">

    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary left">編集</a>
    

    
    
    <form action="{{route('categories.destroy',$category->id)}}" class="left" method="POST" >
    @csrf
<input name="_method" type="hidden" value="DELETE" >
<input type="submit"  value="削除" class="btn btn-danger">
</form>
</div>
@endsection

