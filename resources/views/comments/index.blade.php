






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
    .hidden{
        display:none;
    }
    .thumbnail{
        width:100px;
        height:100px;
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
            {{$product_category->find($post->product_category)->name}}>{{$product_subcategory->find($post->product_subcategory)->name}}<br>
                <h5>{{ $post->name }}</h5><br>
                </div>
            
            <div class="card-body">
                <p class="card-text">{{ $post->created_at->format('Y.m.d H:i') }}</p>
                <p class="card-text">{{ $post->product_content }}</p>
                <div class="card-body">
                @if($post->image1==!null)
                <img class="thumbnail" src="/{{$post->image1}}">
                @endif
                @if($post->image2==!null)
                <img class="thumbnail" src="/{{$post->image2}}">
                @endif
                @if($post->image3==!null)
                <img class="thumbnail" src="/{{$post->image3}}">
                @endif
                @if($post->image4==!null)
                <img class="thumbnail" src="/{{$post->image4}}">
                @endif
                
                
                <p class="card-text">■商品説明<br>{{ $post->product_content }}</p>
                <p class="card-text"><br>総合評価 @for($i = 0; $i < ceil($comments->where('post_id',$post->id)->avg('evaluation')); $i++)<div class="hidden">{{$i}}</div>★@endfor
                            {{ceil($comments->where('post_id',$post->id)->avg('evaluation'))}}</p>
                <!-- @if($post->user_id===Auth::id())
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集する</a>
                <form action='{{ route('posts.destroy', $post->id) }}' method='post'>
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？？");'>
               </form>
                @endif -->
            </div>
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
                    <p class="card-text">{{$user->find($comment->user_id)->name_mei}}さん：@for($i = 0; $i < $comment->evaluation; $i++)<div class="hidden">{{$i}}</div>★@endfor{{ $comment->evaluation }}</p>
                    <p class="card-text">商品コメント：{{ $comment->body }}</p>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
    <div class="mt-3">
{{ $comments->appends(request()->input())->links('vendor/pagination/pagination_view3') }}
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