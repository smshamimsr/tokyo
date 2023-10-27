@extends('dashboard.layouts.dashboardMaster')
@section('title', 'Prices')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title">{{ __('price') }}</h5>
                        <a href="{{ route('prices.create') }}">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></button>
                        </a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($price as $model)
                                <tr>
                                    <th> {{ $loop->iteration }}</th>
                                    <td>{{ ucwords($model->title) }}</td>
                                    <td>{{ $model->price }}</td>
                                    <td>{!! substr($model->description, 0, 20) !!}...</td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <a href="{{ route('prices.show', $model->id) }}">
                                                <button class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('prices.edit', $model->id) }}">
                                                <button class="btn btn-sm btn-outline-success me-2">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'route' => ['prices.destroy', $model->id],
                                                'id' => 'model_delete_form_' . $model->id,
                                                'method' => 'delete',
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', [
                                                'class' => 'btn btn-outline-danger btn-sm delete-model',
                                                'data-id' => $model->id,
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
                    toast: true
                })
            </script>
        @endpush
    @endif

    @push('script')
        <script>
            $('.delete-model').on('click', function() {
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
                        $('#model_delete_form_' + id).submit()
                    }
                })
            })
        </script>
    @endpush
