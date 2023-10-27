@extends('backend.layouts.dashboardMaster')
@section('title', 'Update Experience')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($experience, ['route' => ['experiences.update', $experience], 'method' => 'put']) !!}
                        @include('backend.pages.experience.from')
                        {!! Form::button('update experience', ['class' => 'btn btn-sm btn-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
