@extends('backend.layouts.app')
@section('title','Locations ')
@section('content')
<div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('location.create') }}" >
                  <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add Location</button>
                </a>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      
                      <th style="width: 200px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                     
                      
                      <td>
                        <div class="d-grid gap-2 d-md-block">
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