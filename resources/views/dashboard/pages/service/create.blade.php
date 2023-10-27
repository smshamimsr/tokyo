@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Add Service')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'services.store', 'method' => 'post', 'files' => true]) !!}
                        @include('dashboard.pages.service.form')
                        {!! Form::button('submit', ['class' => 'btn btn-success mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
