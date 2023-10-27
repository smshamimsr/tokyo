<div class="row">
    <div class="col-lg-6">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'interests name ']) !!}
        @error('name')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>

    <div class="col-lg-6">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', [1 => 'Active', 2 => 'Inactive'], null, [
            'class' => 'form-select form-select-sm',
            'placeholder' => 'interests status',
        ]) !!}
        @error('status')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>
</div>
