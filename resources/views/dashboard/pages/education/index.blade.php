@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Education')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body ">
                <div class=" d-flex justify-content-between ">
                    <h4 class="card-title">@yield('title')</h4>

                    <a href="{{ route('educations.create') }}">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </a>
                </div>


                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Institute Name </th>
                            <th> Session </th>
                            <th> Certificate </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($education as $item)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $item->institute_name }} </td>
                                <td> {{ $item->session }} </td>
                                <td> {{ $item->degree }}</td>
                                <td>
                                    <div class="d-inline-flex">

                                        <a href="{{ route('educations.edit', $item->id) }}">
                                            <button class="btn btn-sm btn-primary me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        {!! Form::open([
                                            'route' => ['educations.destroy', $item->id],
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
@endsection
@if (Session::has('message'))
    @push('script')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: '<?php echo session::get('class'); ?>',
                title: '<?php echo session::get('message'); ?>',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endpush
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
