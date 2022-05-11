@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('labels.Create label') }}</h1>

    {{ Form::model($label, ['route' => 'labels.store', 'class' => 'w-50']) }}
        @include('labels.form')
        {{ Form::submit(__('labels.Create'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
