@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Add Language Skills')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Add Language Skills') }}</h4>
                        {!! Form::open(['route' => 'language-skills.store', 'method' => 'post']) !!}
                        @include('dashboard.pages.languageSkill.form')
                        {!! Form::button('Add Language Skill', ['class' => 'btn btn-outline-primary mt-4', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
