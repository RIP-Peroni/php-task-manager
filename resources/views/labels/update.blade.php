@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Обновить метку</h1>

    {{ Form::model($label, ['route' => ['labels.update', $label], 'method' => 'patch', 'class' => 'w-50']) }}
        @include('labels.form')
        {{ Form::submit('Обновить', ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
