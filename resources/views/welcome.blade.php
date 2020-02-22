@extends('layouts.app')

@section('content')
     @if (Auth::check())
     <div class="row">
        <aside class="col-sm-2">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-10">
       @include('tasks.index',['tasks' => $tasks])
       </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ようこそ、Connect ver1.00へ</h1>
            <div class="row">
                <div class="col-sm-7 offset-sm-3">
                    <a>ここはユーザー同士のタスクを共有できるスケジュール管理サイトです。<br>
                        まずはユーザー登録をお願いします。<br>
                        ↓↓<a>
                    <div>
                        {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection