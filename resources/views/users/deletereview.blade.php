@extends('layouts.app')
このコメントを削除しますか？
<br>

<form action="{{route('comments.destroy',$comment->id)}}"  method="POST" >
    @csrf
<input name="_method" type="hidden" value="DELETE">
<input type="submit"  value="削除する" class="btn btn-danger" name="review">
</form><br>