@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Service Details')

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
                                        <td>{{ $service->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $service->title }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $service->status == 1 ? 'Active' : 'Inactive' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $service->description !!}</td>
                                    </tr>

                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ Carbon\Carbon::parse($service->created_at)->format('d M Y h:i a') }}</td>
                                    </tr>
                                    <tr>
                                        <th> Updated At</th>
                                        <td>{{ $service->created_at == $service->updated_at ? 'Not updated yet' : Carbon\Carbon::parse($service->updated_at)->format('d M Y h:i a') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('services.index') }}">
                            <button class="btn btn-outline-primary btn-sm mt-4"><i class="fa-solid fa-circle-left"></i>
                                Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
