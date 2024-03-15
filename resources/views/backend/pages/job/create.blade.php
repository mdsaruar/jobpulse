@extends('backend.layouts.app')
@section('title', 'Add Job')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Add job</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add job</li>
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

                <form action="{{ route('job.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Job Title</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="title"
                                    class="form-control form-control-lg  @if ($errors->has('title')) is-invalid @elseif(old('title')) is-valid @endif"
                                    placeholder="Job Title" value="{{ old('title') }}" />
                                @error('title')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Category</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <select id="SelectSearch" name="category_id"
                                    class="form-control form-control-lg @if ($errors->has('category_id')) is-invalid @elseif(old('category_id')) is-valid @endif">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!--row end -->


                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Skills</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <!-- checkbox -->
                                <div class="form-group ml-10">
                                    @foreach ($skills as $skill)
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}"
                                            {{ (is_array(old('skills')) && in_array($skill->id, old('skills'))) ? 'checked' : '' }}>
                                        <label class="form-check-label mr-5" for="skill_{{ $skill->id }}">{{ $skill->name }}</label>
                                    </div>
                                    @endforeach

                                    @error('skills')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--row end -->


                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Job Nature</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <select name="job_type"
                                    class="form-control form-control-lg @if ($errors->has('job_type')) is-invalid @elseif(old('job_type')) is-valid @endif">
                                    <option value="">Select Job Type</option>
                                    @foreach ($jobtypes as $jobtype)
                                        <option value="{{ $jobtype->id }}"
                                            @if (old('job_type') == $jobtype->id) selected @endif>{{ $jobtype->name }}</option>
                                    @endforeach
                                </select>
                                @error('job_type')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                            </div>
                        </div>

                        <!--row end -->


                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Vacancy</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="vacancy"
                                    class="form-control form-control-lg  @if ($errors->has('vacancy')) is-invalid @elseif(old('vacancy')) is-valid @endif"
                                    placeholder="Vacancy" value="{{ old('vacancy') }}" />
                                @error('vacancy')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Salary</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="salary"
                                    class="form-control form-control-lg  @if ($errors->has('salary')) is-invalid @elseif(old('salary')) is-valid @endif"
                                    placeholder="salary" value="{{ old('salary') }}" />
                                @error('salary')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Location</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="location"
                                    class="form-control form-control-lg  @if ($errors->has('location')) is-invalid @elseif(old('location')) is-valid @endif"
                                    placeholder="location" value="{{ old('location') }}" />
                                @error('location')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Dateline</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" name="dateline"
                                    class="form-control form-control-lg  @if ($errors->has('dateline')) is-invalid @elseif(old('dateline')) is-valid @endif"
                                    placeholder="dateline" value="{{ old('dateline') }}" />
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                                @error('dateline')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div> <!--row end -->


                        <hr class="mx-n3">



                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0"> Desctiption</h6>
                            </div>

                            <div class="col-md-10 pe-5">
                                <div class="card card-outline card-info">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- Hidden input for Summernote content -->
                                        <input type="hidden" id="content_details" name="hidden_deatils">
                                        <textarea id="summernote" name="content_details"> {{ old('content_details') }} </textarea>
                                    </div>

                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- End /row -->

                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Benefits</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <textarea name="benefits" class="form-control">{{ old('benefits') }}</textarea>
                            </div>
                        </div>  <!-- End row -->
                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Responsibility</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <textarea name="responsibility" class="form-control">{{ old('responsibility') }}</textarea>
                            </div>
                        </div>  <!-- End row -->
                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Qualifications</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <textarea name="qualifications" class="form-control">{{ old('qualifications') }}</textarea>
                            </div>
                        </div>  <!-- End row -->



                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Keywords</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="Keywords"
                                    class="form-control form-control-lg  @if ($errors->has('Keywords')) is-invalid @elseif(old('vacancy')) is-valid @endif"
                                    placeholder="Keywords" value="{{ old('Keywords') }}" />
                                @error('Keywords')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1"> <!-- Start of row -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Enable Slider</h6> <!-- Heading for the Enable Slider section -->
                            </div>
                            <div class="col-md-10 pe-5">
                                <select name="slider" class="form-control form-control-lg @if ($errors->has('slider')) is-invalid @elseif(old('slider')) is-valid @endif">
                                    <option value="no" @if (old('slider') == 'no') selected @endif>No</option> <!-- Option for No -->
                                    <option value="yes" @if (old('slider') == 'yes') selected @endif>Yes</option> <!-- Option for Yes -->
                                </select>
                                @error('slider')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }} <!-- Error message for the 'slider' field validation -->
                                </div>
                                @enderror
                            </div>
                        </div> <!-- End of row -->


                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Status</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <select name="status"
                                class="form-control form-control-lg @if ($errors->has('status')) is-invalid @elseif(old('status')) is-valid @endif">

                                <option value="0" @if (old('status') == '0') selected @endif>Inactive
                                </option>
                                <option value="1" @if (old('status') == '1') selected @endif>Active
                                </option>

                            </select>
                            @error('status')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

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

            </div>
        </div>
    </div>


    </div>

@push('scripts_job_create')
<script>
    $(function() {
        $('#datepicker').datepicker();

    });

</script>
@endpush



@endsection
