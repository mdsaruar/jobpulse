@extends('backend.layouts.app')
@section('title', 'Update Job Type')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Update Job Type</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Update Job Type</li>
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
            @if (session('error'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                    })

                    ;
                    (async () => {
                        Toast.fire({
                            icon: 'error',
                            title: "{{ session('error') }}",
                        })

                    })()
                </script>
            @endif
                <form action="{{ route('JobType.update',$Jobtype->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Job Type</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="name"
                                    class="form-control form-control-lg  @if ($errors->has('name')) is-invalid @elseif(old('name')) is-valid @endif"
                                    placeholder="Job type" value="{{ old('name') ?? $Jobtype->name }}" />
                                @error('name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->


                        <hr class="mx-n3">

                        <!-- ./row -->

                        <div class="row align-items-center py-1 mt-2"> <!--row Start -->
                            <div class="col-md-4 ps-5"> </div>
                            <div class="col-md-3 pe-5">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div> <!--row end -->

                    </div> <!--card body End-->

                </form>

            </div>
        </div>
    </div>


    </div>





@endsection
