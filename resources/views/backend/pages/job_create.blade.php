@extends('backend.layouts.app')
@section('title', 'Add Job')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Add Location</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Location</li>
                        </ol>
                    </div><!-- /.col -->
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
                <form action="{{ route('job.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Job Title</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="job_title" class="form-control form-control-lg"
                                    placeholder="Job Title" required />
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">

                        <div class="row align-items-center py-1"><!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Company Name</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <div class="">
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>Company ABC</option>
                                        <option>Company ABC 2</option>
                                        <option>Company ABC 3</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">

                        <div class="row align-items-center py-1"><!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Job Catagories</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <div class="">
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>Web Developer</option>
                                        <option>Company ABC 2</option>
                                        <option>Company ABC 3</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">
                        <div class="row align-items-center py-1"><!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Job Locations</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <div class="">
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>Dhaka</option>
                                        <option>Savar</option>
                                        <option>Company ABC 3</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Location name</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="location" class="form-control form-control-lg"
                                    placeholder="Job Category name" required />
                            </div>
                        </div> <!--row end -->
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Zip Code</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="zip_code" class="form-control form-control-lg"
                                    placeholder="Enter Zip Code" required />
                            </div>
                        </div> <!--row end -->

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Job Deatils</h6>
                            </div>

                            <div class="col-md-10 pe-5">
                              <div class="card card-outline card-info">

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <textarea id="summernote">
                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                  </textarea>
                                </div>

                              </div>
                            </div>
                            <!-- /.col-->
                          </div>
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
