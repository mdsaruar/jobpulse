@extends('backend.layouts.app')
@section('title', 'Product List')
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

                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('product.create') }}">
                        <button type="button" class="btn btn-outline-primary mb-2"><i class="fa fa-edit"></i> Add
                            Product</button>
                    </a>


                    <table id="DataAllList" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>price</th>
                                <th>Stock</th>
                                <th>Discount</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td> <img src="{{ asset($product->image) }}" alt="" width="100px"></td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>{!!$product->description !!}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-success ml-2 mr-2">Edit</a>
                                            <form id="delete-form" action="{{ route('product.destroy', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger ml-auto"
                                                    onclick="confirmation(event)">Delete</button>
                                            </form>
                                        </div>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>


                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->
    @endsection
