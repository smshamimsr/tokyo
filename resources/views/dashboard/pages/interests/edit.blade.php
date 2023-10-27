@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Update Interests')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($interests, ['route' => ['interests.update', $interests], 'method' => 'put', 'files' => true]) !!}
                        @include('dashboard.pages.interests.form')
                        {!! Form::button('update interests', ['class' => 'btn btn-sm btn-outline-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
