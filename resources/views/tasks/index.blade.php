@extends('layouts.app')

@section('header', 'Задачи')
@section('content')
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
{{--                    todo статус--}}
                    <td>статус</td>
                    <td>{{ $task->name }}</td>
                    {{--                    todo Автор--}}
                    <td>Автор</td>
                    {{--                    todo Исполнитель--}}
                    <td>Исполнитель</td>
                    <td>{{ $task->created_at }}</td>
{{--                    todo добавить ограничение - можно удалить только если создавал сам залогиненный пользователь--}}
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
