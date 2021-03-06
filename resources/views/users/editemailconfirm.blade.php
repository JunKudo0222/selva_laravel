
@extends('layouts.app')

<style>
    .{
        float:left;
        width:1000px;
    }
    .rightbutton{
        float:right;
    }
    .lefttitle{
        float:left;
    }
    </style>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="lefttitle">メールアドレス編集　認証コード入力</h1>
                    <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary rightbutton">マイページへ戻る</a>
                </div>
                @if(isset($message))
                <div class="alert alert-success">
                    <ul>
                        
                        <li>認証コードが違います</li>
                        
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    
                    
                    
                    <form method="POST" action="{{ route('users.update',$user->id) }}" name="auth_code" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                        @csrf
                        @isset($user)
                        <input id="id"  type="hidden" name="id" value="{{$user->id}}" >
                        @endisset
                        

                        
                        
                        <div class="form-group row">
                            <label for="auth_code" class="col-md-4 col-form-label text-md-right">認証コード</label>

                            <div class="col-md-6">
                                
                                <input id="auth_code" type="auth_code" class="form-control @error('auth_code') is-invalid @enderror" name="auth_code" value="" required autocomplete="auth_code">
                                

                                @error('auth_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    認証コードを送信してメールアドレスの変更を完了する
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection