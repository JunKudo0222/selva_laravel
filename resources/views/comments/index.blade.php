






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
<h1>商品レビュー一覧</h1>
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



    


    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($comments as $index=>$comment)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="cname">投稿日時：{{ $comment->created_at->format('Y.m.d H:i') }}</h5>
                    <p class="card-text">内容：{{ $comment->body }}</p>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>






    
    
    @if( Auth::check() )
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="btn btn-primary" href="{{route('posts.show',$post->id)}}">商品詳細に戻る</a>
        </div>
    </div>
    @endif
</div>
@endsection