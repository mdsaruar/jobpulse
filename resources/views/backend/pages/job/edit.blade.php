@extends('backend.layouts.app')
@section('title', 'Edit Job')
@section('content')

<div class="row">

    <div class="col-xl-12">
        <div class="callout callout-info mt-2">
            <div class="row">

                <div class="col-md-6  mt-2">
                    <h5><i class="nav-icon fa fa-user-plus"></i> Edit job</h5>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit job</li>
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

            <form action="{{ route('job.update', $job->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                        <div class="col-md-2 ps-5">
                            <h6 class="mb-0">Job Title</h6>
                        </div>
                        <div class="col-md-10 pe-5">
                            <input type="text" name="title"
                                class="form-control form-control-lg  @if ($errors->has('title')) is-invalid @elseif(old('title', $job->title)) is-valid @endif"
                                placeholder="Job Title" value="{{ old('title', $job->title) }}" />
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
                                class="form-control form-control-lg @if ($errors->has('category_id')) is-invalid @elseif(old('category_id', $job->category_id)) is-valid @endif">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if (old('category_id', $job->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
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
                                    <input class="form-check-input mr-3" type="checkbox" id="skill_{{ $skill->id }}"
                                        name="skills[]" value="{{ $skill->id }}"
                                        {{ (is_array(old('skills', $job->skills->pluck('id')->toArray())) && in_array($skill->id, old('skills', $job->skills->pluck('id')->toArray()))) ? 'checked' : '' }}>
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

                    <!-- Rest of the form fields, modified to pre-fill with existing data -->
                    <!-- Please adjust as needed -->

                    <!-- Job Nature -->
                    <div class="row align-items-center pt-2 pb-1">
                        <div class="col-md-2 ps-5">
                            <h6 class="mb-0">Job Nature</h6>
                        </div>
                        <div class="col-md-10 pe-5">
                            <select name="job_nature"
                                class="form-control form-control-lg @if ($errors->has('job_nature')) is-invalid @elseif(old('job_nature', $job->job_nature)) is-valid @endif">
                                <option value="">Select Job Nature</option>
                                <option value="Full Time" @if (old('job_nature', $job->job_nature) == 'Full Time') selected @endif>Full Time
                                </option>
                                <option value="Part Time" @if (old('job_nature', $job->job_nature) == 'Part Time') selected @endif>Part Time
                                </option>
                                <option value="Remote" @if (old('job_nature', $job->job_nature) == 'Remote') selected @endif>Remote
                                </option>
                            </select>
                            @error('job_nature')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <hr class="mx-n3">

                        <!-- ./row -->

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">job Details</h6>
                            </div>

                            <div class="col-md-10 pe-5">
                                <div class="card card-outline card-info">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- Hidden input for Summernote content -->
                                        <input type="hidden" id="content_details" name="hidden_deatils">
                                        <textarea id="summernote" name="content_details"> {{ old('content_details') ?? $job->description }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->

                    <!-- Submit Button -->
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
