@section('content')
@if(isset($category))
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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="lefttitle">商品カテゴリ編集</h1>
                    <a href="{{ route('categories.categorylist') }}" class="btn btn-primary rightbutton">一覧へ戻る</a>
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
                    
                    
                    
                    <form method="POST" action="{{ route('categories.post') }}">
                        @isset($category)
                        ID {{$category->id}}
                        @endisset
                        @csrf
                        @isset($category)
                        <input id="id"  type="hidden" name="id" value="{{$category->id}}" >
                        @endisset
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right ">{{ __('商品大カテゴリ') }}</label>

                            <div class="col-md-6 ">
                                @if(old('name')==!null)
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @else
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>
                                @endif

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        



                        <div class="form-group row">
                            <label for="subcategory" class="col-md-4 col-form-label text-md-right">{{ __('商品小カテゴリ') }}</label>

                            <div class="col-md-6">
                                @if(old('subcategories')==!null)
                                @foreach($subcategories as $subcategory)
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{ old('subcategory') }}"  autocomplete="subcategory">
                                @endforeach
                                @else
                                @foreach($subcategories as $subcategory)
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{ $subcategory->name }}"  autocomplete="subcategory">
                                @endforeach
                                @for($i = 0; $i < 10-count($subcategories); $i++)
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value=""  autocomplete="subcategory">
                                @endfor
                                @endif
                                @error('subcategory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                
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



@else




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



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="lefttitle">商品カテゴリ登録</h1>
                    <a href="{{ route('categories.categorylist') }}" class="btn btn-primary rightbutton">一覧へ戻る</a>
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
                    
                    
                    
                    <form method="POST" action="{{ route('categories.post') }}">
                        
                        商品大カテゴリID 登録後に自動採番
                        
                        @csrf
                        
                        
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right ">{{ __('商品大カテゴリ') }}</label>

                            <div class="col-md-6 ">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{old('name')}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="subcategory" class="col-md-4 col-form-label text-md-right">{{ __('商品小カテゴリ') }}</label>

                            <div class="col-md-6">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                <input id="subcategory" type="text" class="form-control" name="subcategory" value="{{old('subcategory')}}"  autocomplete="subcategory">
                                @error('subcategory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                
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


@endif
@endsection