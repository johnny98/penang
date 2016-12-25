@extends('layout')

@section('content')

    <h1>新規作成</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="/users" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- form -->
    <form method="post" action="/users/store">

        <!-- エラーがあるかどうかを判断して、has-errorクラスを追加 -->
        <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
            <label>名前</label>
            <input type="text" name="name" value="{{Input::old('name')}}" class="form-control">
            <!-- (最初の）エラーメッセージ表示 -->
            <span class="help-block">{{$errors->first('name')}}</span>
        </div>

        <!-- エラーがあるかどうかを判断して、has-errorクラスを追加 -->
        <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
            <label>E-Mail</label>
            <input type="text" name="email" value="{{Input::old('email')}}" class="form-control">
            <!-- (最初の）エラーメッセージ表示 -->
            <span class="help-block">{{$errors->first('email')}}</span>
        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <input type="submit" value="登録" class="btn btn-primary">

    </form>

@stop