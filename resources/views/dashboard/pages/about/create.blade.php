@extends('backend.layouts.dashboardMaster')
@section('title', 'Update About')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">

                        {!! Form::model($about, ['route' => 'abouts.store', 'method' => 'post', 'files' => 'true']) !!}
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('title', 'Title') !!}
                                {!! Form::text('title', null, [
                                    'class' => 'form-control form-control-sm ',
                                    'placeholder' => 'about title',
                                ]) !!}
                                @error('title')
                                    <p class="mb-0 position-absolute text-danger"><i class="fa-solid fa-triangle-exclamation"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, [
                                    'class' => 'form-control form-control-sm ',
                                    'placeholder' => 'mr. jon',
                                ]) !!}
                                @error('name')
                                    <p class="mb-0 position-absolute text-danger"><i
                                            class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mt-4">
                                {!! Form::label('phone', 'Phone') !!}
                                {!! Form::text('phone', null, [
                                    'class' => 'form-control form-control-sm ',
                                    'placeholder' => '+00 987654321',
                                ]) !!}
                                @error('name')
                                    <p class="mb-0 position-absolute text-danger"><i
                                            class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mt-4">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', null, [
                                    'class' => 'form-control form-control-sm ',
                                    'placeholder' => 'jon@gmail.com',
                                ]) !!}
                                @error('email')
                                    <p class="mb-0 position-absolute text-danger"><i
                                            class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mt-4">
                                {!! Form::label('age', 'Age') !!}
                                {!! Form::number('age', null, [
                                    'class' => 'form-control form-control-sm ',
                                    'placeholder' => '20',
                                ]) !!}
                                @error('age')
                                    <p class="mb-0 position-absolute text-danger"><i
                                            class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mt-4">
                                {!! Form::label('address', 'Address') !!}
                                {!! Form::text('address', null, [
                                    'class' => 'form-control form-control-sm ',
                                    'placeholder' => 'enter address',
                                ]) !!}
                                @error('address')
                                    <p class="mb-0 position-absolute text-danger"><i
                                            class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </p>
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
                                    <div class="col-lg-6">
                                        <div class="exist_image">
                                            <img src="{{ asset('image/uploads/about/thumbnail/' . $about?->photo) }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                {!! Form::label('description', 'description') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control form-control-sm', 'id' => 'desciption']) !!}
                                @error('description')
                                    <p class="mb-0 position-absolute text-danger"><i
                                            class="fa-solid fa-triangle-exclamation"></i>
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {!! Form::button('submit', ['class' => 'btn btn-success mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#desciption'))
            .catch(error => {
                console.error(error);
            });

        $('#photo').on('change', function(e) {
            let photo = e.target.files[0]
            photo = URL.createObjectURL(photo)
            $('#feather_image').attr('src', photo)
            $('.show-img').show();
        })
    </script>
@endpush
