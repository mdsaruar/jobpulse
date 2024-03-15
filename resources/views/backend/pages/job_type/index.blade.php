@extends('backend.layouts.app')
@section('title', 'Job Type List')
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
                    <a href="{{ route('JobType.create') }}">
                        <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add
                            Job Type</button>
                    </a>


                    <table id="DataAllList" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Jobtypes as $Jobtype)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $Jobtype->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('JobType.edit', $Jobtype->id) }}"
                                                class="btn btn-success ml-2 mr-2">Edit</a>
                                            <form id="delete-form" action="{{ route('JobType.destroy', $Jobtype->id) }}"
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
