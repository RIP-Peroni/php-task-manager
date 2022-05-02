@extends('layouts.app')

@section('header', 'Создать статус')
@section('content')

    {{ Form::model($status, ['route' => 'task_statuses.store', 'class' => 'w-50']) }}
        @include('statuses.form')
        {{ Form::submit('Создать', ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
