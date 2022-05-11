@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('statuses.Statuses') }}</h1>

    @if (Auth::check())
        {{ link_to_route('task_statuses.create', __('statuses.Create status'), [], ['class' => 'btn btn-primary']) }}
    @endif
    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('statuses.Name') }}</th>
                <th>{{ __('statuses.Date of creation') }}</th>
                @if (Auth::check())
                    <th>{{ __('statuses.Actions') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($taskStatuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->created_at }}</td>
                    @if (Auth::check())
                        <td>
                            {{ link_to_route('task_statuses.destroy', __('statuses.Delete'), ['task_status' => $status],
                                ['class' => 'text-danger text-decoration-none', 'data-confirm' => __('statuses.Are you sure?'), 'data-method' => "delete", 'rel' => "nofollow"]) }}
                            {{ link_to_route('task_statuses.edit', __('statuses.Edit'), [$status->id], ['class' => 'text-decoration-none']) }}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
