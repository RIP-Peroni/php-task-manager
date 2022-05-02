@extends('layouts.app')

@section('header', 'Статусы')
@section('content')
    @if (Auth::check())
        {{ link_to_route('task_statuses.create', 'Создать статус', [], ['class' => 'btn btn-primary']) }}
    @endif
    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Дата создания</th>
                @if (Auth::check())
                    <th>Действия</th>
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
                            {{ link_to_route('task_statuses.destroy', 'Удалить', ['task_status' => $status],
                                ['class' => 'text-danger text-decoration-none', 'data-confirm' => 'Вы уверены?', 'data-method' => "delete", 'rel' => "nofollow"]) }}
                            {{ link_to_route('task_statuses.edit', 'Изменить', [$status->id], ['class' => 'text-decoration-none']) }}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
