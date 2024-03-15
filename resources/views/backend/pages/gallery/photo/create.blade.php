@extends('backend.layouts.app')
@section('title', 'Add Photo')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Add Photo on  {{ request()->input('name') }} Album</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Photo</li>
                        </ol>
                    </div><!-- /.col -->
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
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
                <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Photo Name</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="photo_name"
                                    class="form-control form-control-lg  @if ($errors->has('photo_name')) is-invalid @elseif(old('photo_name')) is-valid @endif"
                                    placeholder="Photo Name" value="{{ old('photo_name') }}" />
                                @error('photo_name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <input type="hidden" name="album_id" id="album" value="{{ request()->input('album') }}">

                            </div>
                        </div> <!--row end -->


                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Photo Desctiption</h6>
                            </div>

                            <div class="col-md-10 pe-5">
                                <div class="card card-outline card-info">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- Hidden input for Summernote content -->
                                        <input type="hidden" id="content_details" name="hidden_deatils">
                                        <textarea id="summernote" name="content_details">{{ old('content_details')}} </textarea>
                                    </div>

                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Photo</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                {{-- <input type="file" id="image" name="cover_photo" class="form-control form-control-lg"> --}}

                                <div class="custom-file">
                                    <input type="file"
                                        class="form-control form-control-lg custom-file-input @if ($errors->has('photo_path')) is-invalid @elseif(old('photo_path')) is-valid @endif"
                                        name="photo_path" onchange="updateFileName(this)" id="customFile">
                                    @error('photo_path')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label class="custom-file-label" for="customFile" id="fileLabel">Choose file</label>
                                </div>




                            </div>
                        </div> <!--row end -->


                        <div class="row align-items-center py-1 mt-2"> <!--row Start -->
                            <div class="col-md-4 ps-5"> </div>
                            <div class="col-md-3 pe-5">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div> <!--row end -->

                    </div> <!--card body End-->

                </form>
                <script>
                    $(document).ready(function() {
                        // Get the Summernote content
                        var summernoteContent = $('#summernote').summernote('code');

                        // Set the Summernote content to the hidden input
                        $('#content_details').val(summernoteContent);

                        $('#summernote').summernote({
                            disableReturn: true,
                            // other options...
                        });

                        // Submit the form
                        this.submit();
                    });

                    function updateFileName(input) {
                        var fileName = input.files[0].name;
                        $('#fileLabel').text(fileName);
                    }
                </script>
            </div>
        </div>
    </div>


    </div>





@endsection
