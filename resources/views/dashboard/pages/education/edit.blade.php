@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Update Education')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($education, ['route' => ['educations.update', $education], 'method' => 'put']) !!}
                        @include('dashboard.pages.education.from')
                        {!! Form::button('update education', ['class' => 'btn btn-sm btn-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
