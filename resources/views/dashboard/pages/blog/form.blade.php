<div class="row">
    <div class="col-lg-6">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, [
            'class' => 'form-control form-control-sm name',
            'placeholder' => 'blog title...',
        ]) !!}
        @error('title')
            <p class="mb-0 position-absolute text-danger"><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
            </p>
        @enderror
    </div>
    <div class="col-lg-6">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, [
            'class' => 'form-control form-control-sm blog-slug',
            'placeholder' => 'blog slug...',
        ]) !!}
        @error('slug')
            <p class="mb-0 position-absolute text-danger"><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
            </p>
        @enderror
    </div>

    <div class="col-lg-12 mt-4">
        {!! Form::label('description', 'description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control form-control-sm', 'id' => 'desciption']) !!}
        @error('description')
            <p class="mb-0 position-absolute text-danger"><i class="fa-solid fa-triangle-exclamation"></i>
                {{ $message }}</p>
        @enderror
    </div>

    <div class="col-lg-12 mt-4">
        {!! Form::label('photo', 'photo') !!}
        {!! Form::file('photo', ['class' => 'form-control form-control-sm', 'id' => 'photo']) !!}
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="show-img" style="display: none">
                    <img id="feather_image" alt="">
                </div>
            </div>
            @if (Route::currentRouteName() == 'blogs.edit')
                <div class="col-lg-6">
                    <div class="blog-img">
                        <img src="{{ asset('image/uploads/blog/thumbnail/' . $blog?->photo) }}"
                            alt="{{ $blog?->title }}">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#desciption'))
            .catch(error => {
                console.error(error);
            });

        $('.name').on('input', function() {
            let val = $(this).val();
            val = val.replaceAll(" ", "-").toLowerCase();
            $('.blog-slug').val(val)
        })
        $('#photo').on('change', function(e) {
            let photo = e.target.files[0]
            photo = URL.createObjectURL(photo)
            $('#feather_image').attr('src', photo)
            $('.show-img').show();
        })
    </script>
@endpush
