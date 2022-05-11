@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('tasks.Changing a task') }}</h1>

    {{ Form::model($task, ['route' => ['tasks.update', $task], 'method' => 'patch', 'class' => 'w-50']) }}
        @include('tasks.form')
        {{ Form::submit(__('tasks.Update'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
