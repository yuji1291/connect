@extends('layouts.app')

@section('content')

    <h1>「{{ $task->title }}」 のタスク編集ページ</h1>

    <div class="row">
        
        <div class="col-sm-8">
               {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
                 <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div> 
                
                <div class="form-inline">
                    {!! Form::label('start_date', '開始時刻:') !!}
                    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                    {!! Form::time('start_time', null, ['class' => 'form-control']) !!}
                </div> 
                
                <div class="form-inline">
                    {!! Form::label('end_date', '終了時刻:') !!}
                    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                    {!! Form::time('end_time', null, ['class' => 'form-control']) !!}
                </div> 
        
                <div class="form-group">
                    {!! Form::label('place', '場所:') !!}
                    {!! Form::text('place', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection