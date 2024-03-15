@extends('backend.layouts.app')
@section('title', $album->name)


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('photo.create',['album' => $album->id , 'name' => $album->name]) }}">
                        <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add Photo </button>
                    </a>
                    <a href="{{ route('album.show') }}">
                        <button type="button" class="btn btn-outline-primary mb-2 float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> back </button>
                    </a>
                    <h1>Album Name: {{$album->name}} </h1>

                    <div class="row">

                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" height="200" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">D</h5>
                                        <p class="card-text">He</p>
                                        <a href="#" class="btn btn-primary">View</a>
                                        <a href="#"
                                            class="btn btn-success">Edit</a>
                                        <a href="#"
                                            class="btn btn-danger float-right" onclick="confirmation(event)">Delete</a>
                                    </div>
                                </div>
                            </div>


                        <script>
                            function confirmation(ev) {
                                ev.preventDefault();
                                var urlToRedirect = ev.currentTarget.getAttribute('href');

                                Swal.fire({
                                    title: "Are you sure to Delete this post",
                                    text: "You will not be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, delete it!",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = urlToRedirect;
                                    }
                                });
                            }
                        </script>




                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->
    @endsection
