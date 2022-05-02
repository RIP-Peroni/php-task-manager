@extends('layouts.app')

@section('header', 'Создать статус')
@section('content')

    {{ Form::model($taskStatus, ['route' => ['task_statuses.update', $taskStatus], 'method' => 'patch', 'class' => 'w-50']) }}
        @include('statuses.form')
        {{ Form::submit('Обновить', ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
