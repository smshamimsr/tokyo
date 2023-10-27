<div class="row">
    <div class="col-lg-6">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'service title...']) !!}
        @error('title')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>

    <div class="col-lg-6">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', [1 => 'Active', 2 => 'Inactive'], null, [
            'class' => 'form-select form-select-sm',
            'placeholder' => 'service status',
        ]) !!}
    </div>

    <div class="col-lg-12 mt-4">
        {!! Form::label('description', 'description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control form-control-sm', 'id' => 'desciption']) !!}
        @error('description')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>


</div>

@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#desciption'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
