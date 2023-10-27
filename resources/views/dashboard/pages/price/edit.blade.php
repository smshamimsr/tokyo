@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Update Price')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($pricing, ['route' => ['prices.update', $pricing], 'method' => 'put', 'files' => true]) !!}
                        @include('dashboard.pages.price.form')
                        {!! Form::button('update Price', ['class' => 'btn btn-sm btn-outline-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
