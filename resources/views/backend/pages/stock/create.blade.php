@extends('backend.layouts.app')
@section('title', 'Add Product')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Add Product Stock</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Add Product Stock</li>
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
                <form action="{{ route('stock.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Title</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <select id="ProductSearch" name="product_id"
                                    class="form-control form-control-lg @if ($errors->has('product_id')) is-invalid @elseif(old('product_id')) is-valid @endif">
                                    <option value="">Select Product Title</option>
                                    @foreach ($data['products'] as $product)
                                        <option value="{{ $product->id }}"
                                            @if (old('product_id') == $product->id) selected @endif>{{ $product->title }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div id="validatcionServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!--row end -->

                        <hr class="mx-n3">


                        <div class="row align-items-center pt-2 pb-1">
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Vendor Name</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <select id="VendorSearch" name="vendor_id"
                                    class="form-control form-control-lg @if ($errors->has('vendor_id')) is-invalid @elseif(old('vendor_id')) is-valid @endif">
                                    <option value="">Select Vendor Name</option>
                                    @foreach ($data['vendors'] as $vendor)
                                        <option value="{{ $vendor->id }}"
                                            @if (old('vendor_id') == $vendor->id) selected @endif>{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor_id')
                                    <div id="validatcionServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!--row end -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Quantity</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="quantity"
                                    class="form-control form-control-lg  @if ($errors->has('quantity')) is-invalid @elseif(old('quantity')) is-valid @endif"
                                    placeholder="Product quantity" value="{{ old('quantity') }}" />
                                @error('quantity')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Total Cost</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="total_cost"
                                    class="form-control form-control-lg  @if ($errors->has('total_cost')) is-invalid @elseif(old('total_cost')) is-valid @endif"
                                    placeholder="Total Cost" value="{{ old('total_cost') }}" />
                                @error('total_cost')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Date</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="date"
                                    class="form-control form-control-lg  @if ($errors->has('date')) is-invalid @elseif(old('date')) is-valid @endif"
                                    placeholder="Date" value="{{ old('date') }}" />
                                @error('date')
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


@endsection

@push('scripts_stock_create')
    <script>
        $(document).ready(function() {

            $('#ProductSearch').select2({
                placeholder: 'Select an option',
                allowClear: true,
                responsive: true
            });

            $('#VendorSearch').select2({
                placeholder: 'Select an option',
                allowClear: true,
                responsive: true

            });

        });
    </script>
@endpush
