@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('tasks.Tasks') }}</h1>

    <div class="d-flex mb-3">

        <div>
            {{ Form::open(['route' => 'tasks.index', 'method' => 'get']) }}
                <div class="row g-1">
                    <div class="col">
                        {{ Form::select('filter[status_id]',
                            $statusesForFilter,
                            $filter['status_id'] ?? null,
                            ['placeholder' => __('tasks.Status'), 'class' => 'form-select me-2']) }}
                    </div>
                    <div class="col">
                        {{ Form::select('filter[created_by_id]',
                            $usersForFilter,
                            $filter['created_by_id'] ?? null,
                            ['placeholder' => __('tasks.Creator'), 'class' => 'form-select me-2']) }}
                    </div>
                    <div class="col">
                        {{ Form::select('filter[assigned_to_id]',
                            $usersForFilter,
                            $filter['assigned_to_id'] ?? null,
                            ['placeholder' => __('tasks.Executor'), 'class' => 'form-select me-2']) }}
                    </div>
                    <div class="col">
                        {{ Form::submit(__('tasks.Apply'), ['class' => 'btn btn-outline-primary me-2']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>

        @if (Auth::check())
            <div class="ms-auto">
            {{ link_to_route('tasks.create', __('tasks.Create task'), [], ['class' => 'btn btn-primary']) }}
            </div>
        @endif
    </div>

    <table class="table me-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('tasks.Status') }}</th>
                <th>{{ __('tasks.Name') }}</th>
                <th>{{ __('tasks.Creator') }}</th>
                <th>{{ __('tasks.Executor') }}</th>
                <th>{{ __('tasks.Date of creation') }}</th>
                @if (Auth::check())
                    <th>{{ __('tasks.Actions') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->status->name }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a>
                    </td>
                    <td>{{ $task->creator->name }}</td>
                    <td>{{ $task->executor->name ?? null }}</td>
                    <td>{{ $task->created_at->format('d.m.Y') }}</td>
                    @if (Auth::check())
                        <td>
                            @can('delete', $task)
                            {{ link_to_route('tasks.destroy', __('tasks.Delete'), ['task' => $task],
                                ['class' => 'text-danger text-decoration-none', 'data-confirm' => __('tasks.Are you sure?'), 'data-method' => "delete", 'rel' => "nofollow"]) }}
                            @endcan
                            @can('update', $task)
                            {{ link_to_route('tasks.edit', __('tasks.Edit'), [$task->id], ['class' => 'text-decoration-none']) }}
                            @endcan
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
@endsection
