@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('tasks.Create task') }}</h1>

    {{ Form::model($task, ['route' => 'tasks.store', 'class' => 'w-50']) }}
        @include('tasks.form')
        {{ Form::submit(__('tasks.Create'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
