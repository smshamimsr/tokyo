@extends('backend.layouts.dashboardMaster')
@section('title', 'Experience')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body ">
                <div class=" d-flex justify-content-between ">
                    <h4 class="card-title">@yield('title')</h4>

                    <a href="{{ route('experiences.create') }}">
                        <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </a>
                </div>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> Designation </th>
                                <th> Ex. year </th>
                                <th> Description </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experience as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->title }} </td>
                                    <td>
                                        {{ $item->designation }}
                                    </td>
                                    <td>
                                        {{ $item->datefilter }}
                                    </td>
                                    <td> {!! substr($item->description, 0, 20) !!}... </td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <a href="{{ route('experiences.show', $item->id) }}">
                                                <button class="btn btn-sm btn-success mr-2">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('experiences.edit', $item->id) }}">
                                                <button class="btn btn-sm btn-success mr-2">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'route' => ['experiences.destroy', $item->id],
                                                'id' => 'item_delete_form_' . $item->id,
                                                'method' => 'delete',
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', [
                                                'class' => 'btn btn-danger btn-sm delete-item',
                                                'data-id' => $item->id,
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@if (Session::has('msg'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: '<?php echo session::get('cls'); ?>',
            title: '<?php echo session::get('msg'); ?>',
            showConfirmButton: false,
            timer: 1500,
        })
    </script>
@endif

@push('script')
    <script>
        $('.delete-item').on('click', function() {
            let id = $(this).attr('data-id')
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#item_delete_form_' + id).submit()
                }
            })
        })
    </script>
@endpush
