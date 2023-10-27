@extends('backend.layouts.dashboardMaster')
@section('title', 'Blogs Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $blog->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $blog->title }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $blog->slug }}</td>
                                </tr>
                                <tr>
                                    <th>Craeted At</th>
                                    <td>{{ Carbon\Carbon::parse($blog->created_at)->format('d M y g:i a') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $blog->created_at == $blog->updated_at ? 'Not updated yet' : Carbon\Carbon::parse($blog->updated_at)->format('d M y g:i a') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{!! $blog->description !!}</td>
                                </tr>
                                <tr>
                                    <th>Photo</th>
                                    <td><img class="w-50 h-50"
                                            src="{{ asset('image/uploads/blog/thumbnail/' . $blog->photo) }}"
                                            alt="  {{ $blog->title }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('blogs.index') }}">
                            <button class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
