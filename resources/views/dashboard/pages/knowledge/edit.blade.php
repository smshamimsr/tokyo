@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Update Knowledge')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($knowledge, ['route' => ['knowledges.update', $knowledge], 'method' => 'put', 'files' => true]) !!}
                        @include('dashboard.pages.knowledge.form')
                        {!! Form::button('update knowledge', ['class' => 'btn btn-sm btn-outline-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
