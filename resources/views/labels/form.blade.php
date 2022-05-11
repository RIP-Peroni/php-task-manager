<div class="form-group mb-3">
    {{ Form::label('name', __('labels.Name')) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('name')
            {{ $message }}
        @enderror
    </div>
</div>
<div class="form-group mb-3">
    {{ Form::label('description', __('labels.Description')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('description')
        {{ $message }}
        @enderror
    </div>
</div>
