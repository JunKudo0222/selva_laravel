<style>
.topbar{
        float:left;
        width:100%;
        background-color:pink;
        margin-bottom:20px;
        padding:20px;   
       }
       .topbar-content{
           float:left;
       }
       .topbar-content2{
           float:right;
       }
       .idbox{
           width:50px;
       }
       .wordbox{
           width:200px;
       }
       .card{
           width:30%;
           margin-left:auto;
           margin-right:auto;
       }
       .searchtable{
           padding-bottom:10px;
       }
       .searchbutton{
           display:block;
           margin-top:10px;
           margin-bottom:10px;
           margin-left:auto;
           margin-right:auto;
           
       }
       .searchbar{
           width:100%;
        
       }
       tr{
           
       }
       .regist{
           margin-left:35%;
           margin-bottom:10px;
       }
       

</style>



<div class="topbar">
<h1 class="topbar-content">商品カテゴリ一覧</h1>
<a href="{{ route('admin.top') }}" class="btn btn-primary topbar-content2">トップへ戻る</a>
</div>
<a href="{{ route('categories.register_show') }}" class="btn btn-primary regist">商品カテゴリ登録</a>

<form action="{{route('categories.search')}}" method="get" class="searchbar">
					@csrf
                    <table class="searchtable card" border="5">
                    <tr>
                    <th bgcolor="lightblue">ID</th>
                    <th><input type="search" name="id" class="idbox"><br></th>
                    </tr>
                    <tr>
                    <th bgcolor="lightblue">フリーワード</th>
                    <th><input type="search" name="search"  class="wordbox"><br>
  					</th>
                    </tr>
                    </table>

                    
                    
                    
                    
                
                    
                
                
                    <input type="submit"  value="検索する" class="searchbutton">
                
				</form>
                

<body>
				<table border="1" class="sorttbl" id="sampleTable">
                <thead bgcolor="pink">
                    <tr>
                    <th>ID @if(isset($sort))<a href="{{ route('categories.categorylist') }}">▼</a> 
                        @else<a href="{{ route('categories.categorylist',['sort'=>'asc']) }}">▲</a>
                    
                    @endif</th>
                    <th>商品カテゴリ大</th>
                    <th>登録日時 @if(isset($sort))<a href="{{ route('categories.categorylist') }}">▼</a> 
                        @else<a href="{{ route('categories.categorylist',['sort'=>'asc']) }}">▲</a>
                    
                    @endif</th>
                    <th>編集</th>
                    <th>詳細</th>
                    
                </tr>
                <thead>
                <tbody>
                @foreach ($category_list as $category)
                <tr class="item">
				
					
						<td>{{$category->id}}</td>
                        <td><a href="{{ route('categories.detail' , $category->id) }}">{{ $category->name }}</a></td>
                        <td> {{$category->created_at->format('Y/m/d')}}</td>
                        <td><a href="{{ route('categories.edit' , $category->id) }}">編集</a></td>
                        <td><a href="{{ route('categories.detail' , $category->id) }}">詳細</a></td>
					
				
                </tr>
				@endforeach
                </tbody>
            </table>
			
			
            <script src="{{ asset('/js/text.js') }}"></script>
            <link rel="stylesheet" href="{{ asset('/css/text.css') }}">
            
        </body>
        @extends('layouts.app')
        <div class="mt-3">
            {{ $category_list->appends(request()->input())->links('vendor/pagination/pagination_view3') }}
        </div>

        