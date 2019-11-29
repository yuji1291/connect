@extends('layouts.app')

@section('content')
 @if ( count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>開始時刻</th>
                    <th>終了時刻</th>
                    <th>場所</th>
                    <th>タスク</th>
                </tr>
            </thead>
               
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->title, ['title' => $task->id]) !!}</td>
                    <td>{{ $task->start_date }} {{ $task->start_time }}</td>
                    <td>{{ $task->end_date }} {{ $task->end_time }}</td>
                    <td>{{ $task->place }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
     {!! link_to_route('tasks.create', '新規タスクの作成', [], ['class' => 'btn btn-primary']) !!}
@endsection