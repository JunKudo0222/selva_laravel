@extends('layouts.app')

<style>
    .detailbar{
        float:left;
        margin:20;
    }
    .right{
        display:center;
        margin:20;
        margin-left:auto;
        margin-right:auto;
    }
    .left{
        float:left;
        margin:20;
        width:200px;
        margin-left:auto;
        margin-right:auto;
    }
    .bg{
        background-color:pink;
        height:100px;
        width:100%;
        padding:0;
        margin:0;
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
        <li class="list-group-item">氏名: {{ $user->name_sei }}{{ $user->name_mei }}</li>
        <li class="list-group-item">ニックネーム: {{ $user->nickname }}</li>
        <li class="list-group-item">性別: @if($user->gender_id===1) 男性 @else 女性 @endif</li>
        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary left">会員情報変更</a>
        <li class="list-group-item">パスワード: セキュリティのため非表示</li>
        <form action="{{ route('users.edit',$user->id) }}" class="left">
        <button type="submit" class="btn btn-primary left" name="password">パスワード変更</button>
        </form>
        <li class="list-group-item">メールアドレス: {{ $user->email }}</li>
        <form action="{{ route('users.edit',$user->id) }}" class="left">
        <button type="submit" class="btn btn-primary left" name="email">メールアドレス変更</button>
        </form>
        <a href="{{route('users.delete_confirm')}}" class="btn btn-danger right">退会</a>
			</ul>
</div>


@endsection

