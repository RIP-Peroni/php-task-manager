@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('tasks.Task view') }}: {{ $task->name }} <a href="{{ route('tasks.edit', $task->id) }}">&#9881;</a></h1>
    <p>{{ __('tasks.Name') }}: {{ $task->name }}</p>
    <p>{{ __('tasks.Status') }}: {{ $task->status->name }}</p>
    <p>{{ __('tasks.Description') }}: {{ $task->description }}</p>
    @if ($task->labels()->exists())
        <p>{{ __('tasks.Labels') }}:</p>
        <ul>
            @foreach($task->labels as $label)
                <li>{{ $label->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
