@extends('layouts.app')

@section('header', 'Создать статус')
@section('content')

    {{ Form::model($status, ['route' => 'task_statuses.store', 'class' => 'w-50']) }}
        <div class="form-group mb-3">
            {{ Form::label('name', 'Имя') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Создать', ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}

@endsection
