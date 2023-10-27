@extends('dashboard.layouts.dashboardMaster')
@section('title', 'education Details')

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
                                        <td>{{ $education->id }}1</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $education->title }}1</td>
                                    </tr>
                                    <tr>
                                        <th>Results</th>
                                        <td>{{ $education->results }}1</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $education->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Session</th>
                                        <td>{{ $education?->session }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $education->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ Carbon\Carbon::parse($education->created_at)->format('d M Y h:i a') }}</td>
                                    </tr>
                                    <tr>
                                        <th> Updated At</th>
                                        <td>{{ $education->created_at == $education->updated_at ? 'Not updated yet' : Carbon\Carbon::parse($education->updated_at)->format('d M Y h:i a') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('educations.index') }}">
                            <button class="btn btn-primary btn-sm mt-4"><i class="fa-solid fa-circle-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
