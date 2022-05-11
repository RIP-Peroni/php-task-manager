@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light border rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{ __('welcome.Hello from Hexlet!') }}</h1>
            <p class="col-md-8 fs-4">{{ __('welcome.Practical programming courses') }}</p>
            <a href="https://hexlet.io" class="btn btn-primary btn-lg" target="_blank">{{ __('welcome.Learn more') }}</a>
        </div>
    </div>
@endsection
