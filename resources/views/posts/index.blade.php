@extends('layouts.app')　
<style>
    .topright{
        float:right;
    }
    .bottom-center{
        margin-top:50px;
        margin-left:auto;
        margin-right:auto;
    }
    .left{
        float:left;
    }
    .hidden{
        display:none;
    }
    .thumbnail{
        width:100px;
        height:100px;
    }
</style>
@auth
<div class="topbar">
<div class="col-md-2 topright">
           <a href="{{ route('posts.create') }}" class="btn btn-primary">新規商品登録</a>
</div>
</div>
@endauth
@section('content')
<div class="container">
    
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                




            <form action="{{route('posts.search')}}" method="get">
					@csrf
					
  					<input type="search" name="search" placeholder="キーワードを入力">
  					<input type="submit"  value="スレッド検索">
				</form>
				@isset($search_result)
				<div>
		
				
				<h3>
				{{$search_result}}
				</h3>
				</div>
				@endisset






            @foreach ($posts as $post)
                <div class="card-body">
                    @isset($post->image1)
                    <img class="thumbnail" src="{{ url($post->image1) }}">
                    @endisset
                    <h5 class="card-title">
                        

                        
                            {{$product_category->find($post->product_category)->name}}>{{$product_subcategory->find($post->product_subcategory)->name}}<br>
                            {{ $post->name }}<br>
                            @for($i = 0; $i < ceil($comments->where('post_id',$post->id)->avg('evaluation')); $i++)<div class="hidden">{{$i}}</div>★@endfor
                            {{ceil($comments->where('post_id',$post->id)->avg('evaluation'))}}
                            
                        
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
                    </h5>

                </div>
                @endforeach
        </div>
        </div>
        
    </div>
</div>
<div class="col-md-2 bottom-center">
                <a href="/" class="btn btn-primary">トップに戻る</a>
    </div>
@endsection