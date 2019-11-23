@extends('layouts.app')

@section('content')
     @if (Auth::check())
        {{ Auth::user()->name }}
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