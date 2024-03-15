@extends('backend.layouts.app')
@section('title', 'Job Application List')
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

                    <table id="DataAllList" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Company Name</th>
                                <th>Job Title</th>
                                <th>Applicant Name</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($JobApplications as $JobApplication)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $JobApplication->company->name }}</td>
                                    <td>{{ $JobApplication->job->title }}</td>
                                    <td>{{ $JobApplication->user->name }}</td>
                                    <td>{{ $JobApplication->status }}</td>

                                    <td>
                                        <div class="d-flex">
                                            @if ($JobApplication->status == 'pending')
                                            <a href="{{ route('job.application.update', ['id' => $JobApplication->id, 'status' => 'selected']) }}"
                                                class="btn btn-success ml-2 mr-2">Selected</a>


                                            @endif


                                            <form id="delete-form" action="{{ route('job.destroy', $JobApplication->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger ml-auto"
                                                    onclick="confirmation(event)">Reject</button>
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
