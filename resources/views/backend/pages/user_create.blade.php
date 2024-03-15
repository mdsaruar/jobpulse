@extends('backend.layouts.app')
@section('title','Add User')
@section('content')

     <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                    <h5><i class="nav-icon fa fa-user-plus"></i> Add User</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add User Page</li>
                        </ol>
                    </div><!-- /.col -->
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xl-12">
           
         
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                  <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
          
                      <div class="row align-items-center pt-2 pb-1">
                        <div class="col-md-2 ps-5">
          
                          <h6 class="mb-0">Full name</h6>
          
                        </div>
                        <div class="col-md-5 pe-5">
          
                          <input type="text" name="first_name" class="form-control form-control-lg"  placeholder="First Name"/>
          
                        </div>
                        <div class="col-md-5 pe-5">
          
                            <input type="text" name="last_name"  class="form-control form-control-lg" placeholder="Last Name" />
            
                          </div>
                      </div>
          
                      <hr class="mx-n3">
          
                      <div class="row align-items-center py-1">
                        <div class="col-md-2 ps-5">
          
                          <h6 class="mb-0">Email address</h6>
          
                        </div>
                        <div class="col-md-10 pe-5">
          
                          <input type="email" name="email" class="form-control form-control-lg" placeholder="example@example.com" required/>
          
                        </div>
                      </div>
                      <hr class="mx-n3">
                      <div class="row align-items-center py-1">
                        <div class="col-md-2 ps-5">
          
                          <h6 class="mb-0">Username</h6>
          
                        </div>
                        <div class="col-md-10 pe-5">
          
                          <input type="text"  name="username" class="form-control form-control-lg" placeholder="Enter Your Username" required/>
          
                        </div>
                      </div>

                      <hr class="mx-n3">
                      <div class="row align-items-center py-1">
                        <div class="col-md-2 ps-5">
          
                          <h6 class="mb-0">Password</h6>
          
                        </div>
                        <div class="col-md-10 pe-5">
          
                          <input type="password" name="password"  class="form-control form-control-lg" placeholder="Enter Your Password" required/>
          
                        </div>
                      </div>

                      <hr class="mx-n3">
                      <div class="row align-items-center py-1">
                        <div class="col-md-2 ps-5">
          
                          <h6 class="mb-0">Role</h6>
          
                        </div>
                        <div class="col-md-10 pe-5">
          
                            <div class="form-group">
                               
                                <select id="inputStatus" name="role" class="form-control custom-select" required>
                                  <option selected disabled>Select one</option>
                                  <option>Admin</option>
                                  <option>Company</option>
                                  <option>Manager</option>
                                </select>
                              </div>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">
          
                      <div class="row align-items-center py-1">
                        <div class="col-md-2 ps-5">
          
                          <h6 class="mb-0">Upload Photo</h6>
          
                        </div>
                        <div class="col-md-10 pe-5">
          
                          <input class="form-control form-control-lg" name="photo" id="formFileLg" type="file" />
                          <div class="small text-muted mt-2">Upload your Photo in jpg or png. Max file
                            size 300 KB</div>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">

                      <!-- /.card-body -->

                      <div class="row align-items-center py-1">
                        <div class="col-md-4 ps-5"> </div>
                        <div class="col-md-3 pe-5">
          
                            <button type="submit" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-info">Create User</button>
                            
          
                        </div>
                      </div>
                      

          
                    </div>
                    </form>
            </div>  <!-- End card-body -->
            </div>
          
         </div>


     </div>
  @if(session('success'))
    <!-- AdminLTE Success Toast -->
    <script>
        $(document).ready(function () {
            // Display success toast
            toastr.success('{{ session('success') }}');
        });
    </script>
@endif
@endsection