@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('statuses.Create status') }}</h1>

    {{ Form::model($status, ['route' => 'task_statuses.store', 'class' => 'w-50']) }}
        @include('statuses.form')
        {{ Form::submit(__('statuses.Create'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
