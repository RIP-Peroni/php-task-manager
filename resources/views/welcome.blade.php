@extends('layouts.app')

@section('title', 'Менеджер задач')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif

@section('content')
    <div class="p-5 mb-4 bg-light border rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Привет от Хекслета!</h1>
            <p class="col-md-8 fs-4">Практические курсы по программированию</p>
            <a href="https://hexlet.io" class="btn btn-primary btn-lg" target="_blank">Узнать больше</a>
        </div>
    </div>
@endsection
