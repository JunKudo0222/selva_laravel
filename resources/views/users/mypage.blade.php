@extends('layouts.app')

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
<h1 class="detailbar"> 会員詳細</h1>
    <div class="right">
        <a href="/" class="btn btn-primary">トップへ戻る</a>
        <a href="{{ route('logout') }}" class="btn btn-primary"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        ログアウト
        </a>
    </div>
</div>
@section('content')
<div class="container">
		<br>
		<br>
		<br>
		<br>

			<ul class="list-group">
				<li class="list-group-item">ID: {{ $user->id }}</li>
				<li class="list-group-item">名前: {{ $user->name_sei }}{{ $user->name_mei }}</li>
				<li class="list-group-item">性別: @if($user->gender_id===1) 男性 @else 女性 @endif</li>
				<li class="list-group-item">パスワード: セキュリティのため非表示</li>
				<li class="list-group-item">メールアドレス: {{ $user->email }}</li>
			</ul>
		

            










            



















</div>
<div class="select">

    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary left">編集</a>
    

    
    
    <a href="{{route('users.delete_confirm')}}" class="btn btn-danger right">退会</a>
</div>
@endsection

