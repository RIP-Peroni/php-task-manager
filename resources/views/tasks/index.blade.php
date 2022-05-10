@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Задачи</h1>

    <div class="d-flex mb-3">

        <div>
            {{ Form::open(['route' => 'tasks.index', 'method' => 'get']) }}
                <div class="row g-1">
                    <div class="col">
                        {{ Form::select('filter[status_id]',
                            $statusesForFilter,
                            $filter['status_id'] ?? null,
                            ['placeholder' => 'Статус', 'class' => 'form-select me-2']) }}
                    </div>
                    <div class="col">
                        {{ Form::select('filter[created_by_id]',
                            $usersForFilter,
                            $filter['created_by_id'] ?? null,
                            ['placeholder' => 'Автор', 'class' => 'form-select me-2']) }}
                    </div>
                    <div class="col">
                        {{ Form::select('filter[assigned_to_id]',
                            $usersForFilter,
                            $filter['assigned_to_id'] ?? null,
                            ['placeholder' => 'Исполнитель', 'class' => 'form-select me-2']) }}
                    </div>
                    <div class="col">
                        {{ Form::submit('Применить', ['class' => 'btn btn-outline-primary me-2']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>

        @if (Auth::check())
            <div class="ms-auto">
            {{ link_to_route('tasks.create', 'Создать задачу', [], ['class' => 'btn btn-primary']) }}
            </div>
        @endif
    </div>

    <table class="table me-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Статус</th>
                <th>Имя</th>
                <th>Автор</th>
                <th>Исполнитель</th>
                <th>Дата создания</th>
                @if (Auth::check())
                    <th>Действия</th>
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
                    <td>{{ $task->created_at }}</td>
{{--                    todo добавить ограничение - можно удалить только если создавал сам залогиненный пользователь--}}
                    @if (Auth::check())
                        <td>
                            @can('delete', $task)
                            {{ link_to_route('tasks.destroy', 'Удалить', ['task' => $task],
                                ['class' => 'text-danger text-decoration-none', 'data-confirm' => 'Вы уверены?', 'data-method' => "delete", 'rel' => "nofollow"]) }}
                            @endcan
                            @can('update', $task)
                            {{ link_to_route('tasks.edit', 'Изменить', [$task->id], ['class' => 'text-decoration-none']) }}
                            @endcan
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
@endsection
