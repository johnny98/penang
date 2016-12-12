@extends('layout')

@section('content')

    <h1>一覧表示</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="/users/create" class="btn btn-primary" style="margin:20px;">新規登録</a>
        </div>
    </div>

    <!-- table -->
    <table class="table table-striped">

    <!-- loop -->
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a href="/users/show/{{$user->id}}" class="btn btn-primary btn-sm">詳細</a></td>
            <td><a href="/users/edit/{{$user->id}}" class="btn btn-primary btn-sm">編集</a></td>
            <td>
                <form method="post" action="/users/destroy/{{$user->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
                </form>
            </td>
        </tr>
    @endforeach
    </table>

    <!-- page control -->
    {!! $users->render() !!}

@stop