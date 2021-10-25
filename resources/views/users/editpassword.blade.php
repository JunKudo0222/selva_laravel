
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
                    <h1 class="lefttitle">パスワード編集</h1>
                    <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary rightbutton">マイページへ戻る</a>
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
                <div class="card-body">
                    
                    
                    
                    <form method="POST" action="{{ route('users.update',$user->id) }}" name="password" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                        @csrf
                        @isset($user)
                        <input id="id"  type="hidden" name="id" value="{{$user->id}}" >
                        @endisset


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                            
                            <input type="hidden"  name="password1" value="password1">
                            <div class="col-md-6">
                                @if(old('password')==!null)
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}"  autocomplete="new-password">
                                @else
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=""  autocomplete="new-password">
                                @endif
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>
                            
                            <div class="col-md-6">
                                @if(old('password')==!null)
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{old('password')}}"  autocomplete="new-password">
                                @else
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value=""  autocomplete="new-password">
                                @endif
                            </div>
                        </div>
                        

                        
                        
                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    確認画面へ
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