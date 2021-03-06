











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
<h1>商品レビュー編集</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
            @isset($post->image1)
                <img class="thumbnail" src="{{ url($post->image1) }}">
                
                @endisset
                <h5>{{ $post->name }}</h5><br>
                <p class="card-text">■商品レビュー<br>総合評価 @for($i = 0; $i < ceil($post->comments->where('post_id',$post->id)->avg('evaluation')); $i++)<div class="hidden">{{$i}}</div>★@endfor
                            {{ceil($post->comments->where('post_id',$post->id)->avg('evaluation'))}}</p>
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

    @if ($errors->any())
                <div class="alert alert-success">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

    


    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('comments.editconfirm') }}" method="POST" >
            {{csrf_field()}}
        <input type="hidden" name="post_id" value="{{$post->id}}" >
        <input type="hidden" name="comment_id" value="{{$comment->id}}" >
                <div class="form-group">

                    <label>商品評価</label>
                    <div class="is-invalid">
                            <select class="form-control" id="exampleFormControlSelect1" name="evaluation" class="is-invalid">
                                
                                @if(old('evaluation')==!null)
                                <option value="{{old('evaluation')}}" selected>{{old('evaluation')}}</option>
                                @else
                                @if($comment->evaluation==!null&&1<=$comment->evaluation&&old('evaluation')<=5)
                                
                                <option value="{{$comment->evaluation}}" selected>{{$comment->evaluation}}</option>
                                
                                @else
                                <option value="" selected>選択してください</option>
                                @endif
                                @endif
                             
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                            </select>
                          </div>
                    <label>商品コメント</label>
                    @if(old('body')==!null)
                    <textarea class="form-control" rows="5" name="body" value="{{old('body')}}">{{old('body')}}</textarea>
                    @else
                    <textarea class="form-control" rows="5" name="body" value="{{$comment->body}}">{{$comment->body}}</textarea>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">商品レビュー編集確認</button>
            </form>
        </div>
    </div>






    
    
    @if( Auth::check() )
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="btn btn-primary" href="{{route('users.editreview',Auth::id())}}">レビュー管理に戻る</a>
        </div>
    </div>
    @endif
</div>
@endsection