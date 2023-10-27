@extends('backend.layouts.dashboardMaster')
@section('title', 'Update Blog')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($blog, ['route' => ['blogs.update', $blog], 'method' => 'put', 'files' => 'true']) !!}
                        @include('dashboard.pages.blog.form')
                        {!! Form::button('update', ['class' => 'btn btn-success mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
