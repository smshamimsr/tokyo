<div class="row">
    <div class="col-lg-6">
        {!! Form::label('name', 'name') !!}
        {!! Form::text('name', null, [
            'class' => 'form-control form-control-sm name',
            'placeholder' => 'pertner name',
        ]) !!}
        @error('name')
            <p class="mb-0 position-absolute text-danger"><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
            </p>
        @enderror
    </div>
    <div class="col-lg-6">
        {!! Form::label('photo', 'photo') !!}
        {!! Form::file('photo', ['class' => 'form-control form-control-sm', 'id' => 'photo']) !!}
        @error('photo')
            <p class="mb-0 position-absolute error-message text-danger"><i class="fa-solid fa-triangle-exclamation"></i>
                {{ $message }}
            </p>
        @enderror
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="show-img" style="display: none">
                    <img style="width : 100px" id="feather_image" alt="">
                </div>
            </div>
            @if (Route::currentRouteName() == 'partners.edit')
                <div class="col-lg-6">
                    <div class="blog-img">
                        <img src="{{ asset('image/pertner/' . $client?->photo) }}" alt="{{ $client?->title }}">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@push('script')
    <script>
        $('#photo').on('change', function(e) {
            let photo = e.target.files[0]
            photo = URL.createObjectURL(photo)
            $('#feather_image').attr('src', photo)
            $('.show-img').show();
            $('.error-message').empty()
        })
    </script>
@endpush
