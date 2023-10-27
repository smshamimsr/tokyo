@extends('backend.layouts.dashboardMaster')
@section('title', 'Experience Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $experience->id }}1</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $experience->title }}1</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>{{ $experience->designation }}1</td>
                                    </tr>
                                    <tr>
                                        <th>Experiance Year</th>
                                        <td>{{ $experience?->datefilter }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $experience->description !!}1</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ Carbon\Carbon::parse($experience->created_at)->format('d M Y h:i a') }}</td>
                                    </tr>
                                    <tr>
                                        <th> Updated At</th>
                                        <td>{{ $experience->created_at == $experience->updated_at ? 'Not updated yet' : Carbon\Carbon::parse($experience->updated_at)->format('d M Y h:i a') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('experiences.index') }}">
                            <button class="btn btn-primary btn-sm mt-4"><i class="fa-solid fa-circle-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
