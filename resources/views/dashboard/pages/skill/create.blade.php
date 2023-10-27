@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Add Skill')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Add Skill') }}</h4>
                        {!! Form::open(['route' => 'skills.store', 'method' => 'post']) !!}
                        @include('dashboard.pages.skill.form')
                        {!! Form::button('Add Skill', ['class' => 'btn btn-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
