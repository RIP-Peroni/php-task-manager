@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Задачи</h1>

    @if (Auth::check())
        {{ link_to_route('tasks.create', 'Создать задачу', [], ['class' => 'btn btn-primary']) }}
    @endif
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
                            {{ link_to_route('tasks.destroy', 'Удалить', ['task' => $task],
                                ['class' => 'text-danger text-decoration-none', 'data-confirm' => 'Вы уверены?', 'data-method' => "delete", 'rel' => "nofollow"]) }}
                            {{ link_to_route('tasks.edit', 'Изменить', [$task->id], ['class' => 'text-decoration-none']) }}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
