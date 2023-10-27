@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Update Skill')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Update Skill') }}</h4>
                        {!! Form::model($languageSkills, ['route' => ['language-skills.update', $languageSkills], 'method' => 'PUT']) !!}
                        @include('dashboard.pages.languageSkill.form')
                        {!! Form::button('Update Language Skills', ['class' => 'btn btn-outline-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
