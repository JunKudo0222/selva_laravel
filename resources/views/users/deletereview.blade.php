
<style>
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
<h1>商品レビュー削除確認</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
            
                <h5>{{ $post->name }}</h5>
                <a>更新日時:{{ $post->created_at->format('n/j/y H:i') }}</a>
            </div>
            
            <div class="card-body">
                @if($post->image1==!null)
                <img class="thumbnail" src="/{{$post->image1}}">
                @endif
                
                
                
                
                <br>総合評価 @for($i = 0; $i < ceil($comments->where('post_id',$post->id)->avg('evaluation')); $i++)<div class="hidden">{{$i}}</div>★@endfor
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
        </div>
    </div>
商品評価　　　　　{{$comment->evaluation}}<br>
商品コメント　　　{{$comment->body}}<br>
<br>
このコメントを削除しますか？
<br>

<form action="{{route('comments.destroy',$comment->id)}}"  method="POST" >
    @csrf
<input name="_method" type="hidden" value="DELETE">
<input type="submit"  value="削除する" class="btn btn-danger" name="review">
</form><br>
<a href="{{route('users.editreview',Auth::id())}}" class="btn btn-primary">戻る</a>
@endsection