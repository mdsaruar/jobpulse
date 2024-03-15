@extends('backend.layouts.app')
@section('title', 'All Album ')
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
                {{-- <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('album.create') }}">
                        <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add
                            Album</button>
                    </a>
                    <div class="row">
                        @foreach ($albums as $album)
                            <div class="col-sm-4">
                                <div class="card">
                                    <img src="{{ asset($album->cover_photo) }}" height="200" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $album->name }}</h5>
                                        <p class="card-text">{!!$album->desctiption !!}</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ route('photo.show', $album->id) }}"
                                                    class="btn btn-primary">View</a>
                                                <a href="{{ route('album.edit', $album->id) }}"
                                                    class="btn btn-success ml-2">Edit</a>
                                            </div>
                                            <form id="delete-form" action="{{ route('album.destroy', $album->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger ml-auto"
                                                    onclick="confirmation(event)">Delete</button>
                                            </form>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <script>
                            function confirmation(ev) {
                                ev.preventDefault();
                                var urlToRedirect = document.getElementById('delete-form').getAttribute('action');

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
                                        document.getElementById('delete-form').submit();
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
