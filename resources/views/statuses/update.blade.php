@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('statuses.Edit status') }}</h1>

    {{ Form::model($taskStatus, ['route' => ['task_statuses.update', $taskStatus], 'method' => 'patch', 'class' => 'w-50']) }}
        @include('statuses.form')
        {{ Form::submit(__('statuses.Update'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
