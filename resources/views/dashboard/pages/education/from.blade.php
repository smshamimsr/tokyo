<div class="row">
    <div class="col-lg-6">
        {!! Form::label('institute_name', 'Institute Name') !!}
        {!! Form::text('institute_name', null, [
            'class' => 'form-control form-control-sm',
            'placeholder' => 'institute name',
        ]) !!}
        @error('institute_name')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>

    <div class="col-lg-6">
        {!! Form::label('session', 'Session') !!}
        {!! Form::text('session', null, [
            'class' => 'form-control form-control-sm',
            'placeholder' => '2020-2021',
        ]) !!}
        @error('session')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror

    </div>

    <div class="col-lg-12 mt-4">
        {!! Form::label('degree', 'Degree') !!}
        {!! Form::text('degree', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Bachelor Degree']) !!}
        @error('degree')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>
</div>
