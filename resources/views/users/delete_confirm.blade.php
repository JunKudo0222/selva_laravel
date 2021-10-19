<style>
    .btn{
        margin:10px;
    }
    </style>

@extends('layouts.app')
@section('content')
<h1>退会</h1>
退会しますか？
<br>
@auth
<a href="{{route('users.show',Auth::id())}}" class="btn btn-primary">マイページに戻る</a>

<form action="{{route('users.destroy',Auth::id())}}" class="right" method="POST">
    @csrf
<input name="_method" type="hidden" value="DELETE">
<input type="submit"  value="退会する" class="btn btn-danger">
</form><br>
@endsection
@endauth
