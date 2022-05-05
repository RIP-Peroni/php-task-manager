@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Создать статус</h1>

    {{ Form::model($status, ['route' => 'task_statuses.store', 'class' => 'w-50']) }}
        @include('statuses.form')
        {{ Form::submit('Создать', ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
