@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('labels.Labels') }}</h1>

    @if (Auth::check())
        {{ link_to_route('labels.create', __('labels.Create label'), [], ['class' => 'btn btn-primary']) }}
    @endif
    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('labels.Name') }}</th>
                <th>{{ __('labels.Description') }}</th>
                <th>{{ __('labels.Date of creation') }}</th>
                @if (Auth::check())
                    <th>{{ __('labels.Actions') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($labels as $label)
                <tr>
                    <td>{{ $label->id }}</td>
                    <td>{{ $label->name }}</td>
                    <td>{{ $label->description }}</td>
                    <td>{{ $label->created_at }}</td>
                    @if (Auth::check())
                        <td>
                            {{ link_to_route('labels.destroy', __('labels.Delete'), ['label' => $label],
                                ['class' => 'text-danger text-decoration-none', 'data-confirm' => __('labels.Are you sure?'), 'data-method' => "delete", 'rel' => "nofollow"]) }}
                            {{ link_to_route('labels.edit', __('labels.Edit'), [$label->id], ['class' => 'text-decoration-none']) }}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
