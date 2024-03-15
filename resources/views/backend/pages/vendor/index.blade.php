@extends('backend.layouts.app')
@section('title', 'Vendor List')
@section('content')

    <div class="row">
        @if (session('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                })

                ;
                (async () => {
                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('success') }}",
                    })

                })()
            </script>
        @endif

        <div class="col-md-12">
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('vendor.create') }}">
                        <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add
                            vedor</button>
                    </a>


                    <table id="DataAllList" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vendor->name }}</td>
                                    <td>{{ $vendor->phone }}</td>
                                    <td>{!!$vendor->address !!}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('vendor.edit', $vendor->id) }}"
                                                class="btn btn-success ml-2 mr-2">Edit</a>
                                            <form id="delete-form" action="{{ route('vendor.destroy', $vendor->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger ml-auto"
                                                    onclick="confirmation(event)">Delete</button>
                                            </form>
                                        </div>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>


                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->
    @endsection
