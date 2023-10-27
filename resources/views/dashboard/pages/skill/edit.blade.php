@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Update Skill')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Update Skill') }}</h4>
                        {!! Form::model($skill, ['route' => ['skills.update', $skill], 'method' => 'PUT']) !!}
                        @include('dashboard.pages.skill.form')
                        {!! Form::button('Update Skill', ['class' => 'btn btn-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
