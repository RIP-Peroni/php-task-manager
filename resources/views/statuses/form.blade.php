<div class="form-group mb-3">
    {{ Form::label(__('statuses.Name'), 'Имя') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
</div>
