<div class="form-group mb-3">
    {{ Form::label('name', __('statuses.Name')) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <div class="invalid-feedback d-block">
        @error('name')
        {{ $message }}
        @enderror
    </div>
</div>
