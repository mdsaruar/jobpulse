@extends('backend.layouts.app')
@section('title','Job List ')
@section('content')
<div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="{{ route('job.create') }}" >
                    <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add Job</button>
                  </a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


                <form action="enhanced-results.html">
                    <div class="row">



                                <div class="col-4">
                                    <div class="form-group">
                                        <label>location By:</label>
                                        <select id="inputStatus" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <option>Dhaka</option>
                                            <option>Savar</option>
                                            <option>Company ABC 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Category By:</label>
                                        <select id="inputStatus" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <option>Dhaka</option>
                                            <option>Savar</option>
                                            <option>Company ABC 3</option>
                                        </select>
                                    </div>
                                </div>

                            <div class="col-4 pe-5">
                            <div class="form-group">
                                <label>Text By:</label>
                                <div class="input-group">

                                    <input type="search" class="form-control " placeholder="Type your keywords here" value="Lorem ipsum">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>

                    </div>
                </form>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>

                      <th style="width: 250px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>


                      <td>
                        <div class="d-grid gap-2 d-md-block">
                        <button type="button" class="btn btn-outline-success btn-flat"><i class="fas fa-users nav-icon"></i> </button>
                        <button type="button" class="btn btn-outline-info btn-flat"><i class="fas fa-pencil-alt"></i> Edit</button>
                        <button type="button" class="btn btn-outline-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>

                      </div>
                    </td>
                    </tr>


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->


        </div>
        <!-- /.row -->
@endsection
