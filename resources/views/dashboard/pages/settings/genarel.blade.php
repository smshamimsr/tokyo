@extends('backend.layouts.dashboardMaster')
@section('title', 'Update Settings')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">

                        {!! Form::model($settings, ['route' => 'settings.store', 'method' => 'post', 'files' => 'true']) !!}
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('favicon', 'Favicon') !!}
                                {!! Form::file('favicon', ['class' => 'form-control form-control-sm', 'id' => 'fav_icon']) !!}
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <div class="show-fav" style="display: none">
                                            <img id="favicon_img" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="exist_favicon">
                                            <img src="{{ asset('image/uploads/favicon/' . get_option('favicon')) }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                {!! Form::label('logo', 'Logo') !!}
                                {!! Form::file('logo', [
                                    'class' => 'form-control form-control-sm ',
                                    'id' => 'logo',
                                ]) !!}

                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <div class="show-logo" style="display: none">
                                            <img id="feather_logo" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="exist_logo">
                                            <img src="{{ asset('image/uploads/logo/' . get_option('logo')) }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                {!! Form::label('blog_banner', 'Blog Banner') !!}
                                {!! Form::file('blog_banner', [
                                    'class' => 'form-control form-control-sm ',
                                    'id' => 'blog_banner',
                                ]) !!}

                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <div class="blog-banner" style="display: none">
                                            <img id="blog_show_banner" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="blog_banner">
                                            <img src="{{ asset('image/uploads/blog-banner/' . get_option('blog_banner')) }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                {!! Form::label('privacy_policy', 'Privacy Policy') !!}
                                <textarea name="privacy_policy" id="description" cols="30" rows="10">
                                    {{ get_option('privacy_policy') }}
                                </textarea>
                            </div>
                            <div class="col-lg-12 mt-4">
                                {!! Form::label('term_condition', 'Term & Condition') !!}
                                <textarea name="term_condition" id="term" cols="30" rows="10">
                                    {{ get_option('term_condition') }}
                                </textarea>
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
            $('#fav_icon').on('change', function(e) {
                let photo = e.target.files[0]
                photo = URL.createObjectURL(photo)
                $('#favicon_img').attr('src', photo)
                $('.show-fav').show();
            })

            $('#logo').on('change', function(e) {
                let photo = e.target.files[0]
                photo = URL.createObjectURL(photo)
                $('#feather_logo').attr('src', photo)
                $('.show-logo').show();
            })

            $('#blog_banner').on('change', function(e) {
                let photo = e.target.files[0]
                photo = URL.createObjectURL(photo)
                $('#blog_show_banner').attr('src', photo)
                $('.blog-banner').show();
            })

            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });


            ClassicEditor
                .create(document.querySelector('#term'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
