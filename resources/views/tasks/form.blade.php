<div class="form-group mb-3">
    {{ Form::label('name', __('tasks.Name')) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('name')
        {{ $message }}
        @enderror
    </div>
</div>
<div class="form-group mb-3">
    {{ Form::label('description', __('tasks.Description')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('description')
        {{ $message }}
        @enderror
    </div>
</div>
<div class="form-group mb-3">
    {{ Form::label('status_id', __('tasks.Status')) }}<br>
    {{ Form::select('status_id',
        $statuses,
        null,
        ['placeholder' => '----------', 'class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('status_id')
        {{ $message }}
        @enderror
    </div>
</div>
<div class="form-group mb-3">
    {{ Form::label('assigned_to_id', __('tasks.Executor')) }}<br>
    {{ Form::select('assigned_to_id',
        $users,
        null,
        ['placeholder' => '----------', 'class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('assigned_to_id')
        {{ $message }}
        @enderror
    </div>
</div>
<div class="form-group mb-3">
    {{ Form::label('label_id', __('tasks.Labels')) }}<br>
    {{ Form::select('label_id',
        $labels,
        $task->labels,
        ['placeholder' => '', 'multiple' => 'multiple', 'name' => 'labels[]', 'class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('label_id')
        {{ $message }}
        @enderror
    </div>
</div>
