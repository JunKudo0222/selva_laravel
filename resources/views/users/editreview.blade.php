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
    .review-text{
        float:left;
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
            @foreach ($comments as $index=>$comment)
            <div class="card mt-3">
                <div class="review-text">
                    @if($posts->find($comment->post_id)->image1==!null)
                <img class="thumbnail" src="{{ url($posts->find($comment->post_id)->image1) }}">
                    @endif
                </div>
                <div class="review-text">
                    <p class="card-text">{{$product_categories->find($posts->find($comment->post_id)->product_category)->name}}>{{$product_subcategories->find($posts->find($comment->post_id)->product_subcategory)->name}}<br>
                        {{$posts->find($comment->post_id)->name}}<br>
                        @for($i = 0; $i < $comment->evaluation; $i++)<div class="hidden">{{$i}}</div>★@endfor{{ $comment->evaluation }}</p>
                    <p class="card-text">{{ mb_strimwidth( $comment->body, 0, 32, '…', 'UTF-8' ) }}</p>
                </div>
            </div>
            <a class="btn btn-primary" href="{{route('comments.edit',$comment->id)}}">レビュー編集</a>
            <a class="btn btn-primary" href="{{route('comments.destroyconfirm',$comment->id)}}">レビュー削除</a>
            
            @endforeach
        </div>
    </div>
    <div class="mt-3">
{{ $comments->appends(request()->input())->links('vendor/pagination/pagination_view3') }}
</div>
<a href="{{route('users.show',Auth::id())}}" class="btn btn-primary">マイページに戻る</a>
</div>
@endsection