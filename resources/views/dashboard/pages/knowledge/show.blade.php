@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Prices Details')

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
                                        <td>{{ $pricing->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $pricing->title }}</td>
                                    </tr>

                                    <tr>
                                        <th>Price</th>
                                        <td>{{ $pricing->price }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $pricing->description !!}</td>
                                    </tr>

                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ Carbon\Carbon::parse($pricing->created_at)->format('d M Y h:i a') }}</td>
                                    </tr>
                                    <tr>
                                        <th> Updated At</th>
                                        <td>{{ $pricing->created_at == $pricing->updated_at ? 'Not updated yet' : Carbon\Carbon::parse($pricing->updated_at)->format('d M Y h:i a') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('prices.index') }}">
                            <button class="btn btn-outline-primary btn-sm mt-4"><i class="fa-solid fa-circle-left"></i>
                                Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
