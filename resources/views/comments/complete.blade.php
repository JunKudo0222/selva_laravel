











    <style>
    .pager{
        margin-left: auto;
    margin-right: auto;
    width: 8em;
    
    }
    .topbutton{
        float:right;
        width:20%;

    }
    .thumbnail{
        width:100px;
        height:100px;
    }
    .hidden{
        display:none;
    }
</style>


@extends('layouts.app')
@section('content')
<div class="topbutton">
    <a class="btn btn-primary" href="/">トップに戻る</a>
</div>
<h1>商品レビュー登録完了</h1>



商品レビューの登録が完了しました。<br>

<a class="btn btn-primary" href="{{route('comments.index',['id'=>$id])}}">商品レビュー一覧へ</a><br><br>
<a class="btn btn-primary" href="{{route('posts.show',['post_id'=>$id])}}">商品詳細に戻る</a>


    





    
    
    

@endsection