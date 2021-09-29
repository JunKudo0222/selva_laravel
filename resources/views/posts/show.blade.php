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
</style>


@extends('layouts.app')
@section('content')
<div class="topbutton">
    <a class="btn btn-primary" href="/">トップに戻る</a>
</div>
<h1>商品詳細</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>{{ $post->name }}</h5><br>
                <a>{{ $post->comments->count() }}コメント {{ $post->created_at->format('n/j/y H:i') }}</a>
            </div>
            
            <div class="card-body">
                <p class="card-text">{{ $post->created_at->format('Y.m.d H:i') }}</p>
                <p class="card-text">{{ $post->body }}</p>
                <!-- @if($post->user_id===Auth::id())
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集する</a>
                <form action='{{ route('posts.destroy', $post->id) }}' method='post'>
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？？");'>
               </form>
                @endif -->
            </div>
        </div>
    </div>



    


    <a href="{{route('comments.index',['id'=>$post->id])}}">>>レビューを見る</a><br><br>






    
    
    @if( Auth::check() )
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="btn btn-primary" href="{{route('comments.create',['id'=>$post->id])}}">この商品についてのレビューを登録</a><br><br>
        <a class="btn btn-primary" href="{{route('posts.index')}}">商品一覧に戻る</a>
        </div>
    </div>
    @endif
</div>
@endsection