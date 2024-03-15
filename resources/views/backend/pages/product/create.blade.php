@extends('backend.layouts.app')
@section('title', 'Add Product')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Add Product</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Title</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="title"
                                    class="form-control form-control-lg  @if ($errors->has('title')) is-invalid @elseif(old('title')) is-valid @endif"
                                    placeholder="Product title" value="{{ old('title') }}" />
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
                                <h6 class="mb-0">Product Category</h6>
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

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product price</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="price"
                                    class="form-control form-control-lg  @if ($errors->has('price')) is-invalid @elseif(old('price')) is-valid @endif"
                                    placeholder="Product price" value="{{ old('price') }}" />
                                @error('price')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product discount</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="discount"
                                    class="form-control form-control-lg  @if ($errors->has('discount')) is-invalid @elseif(old('discount')) is-valid @endif"
                                    placeholder="Product discount" value="{{ old('discount') }}" />
                                @error('discount')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">

                        <!-- ./row -->

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Desctiption</h6>
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
                        <!-- ./row -->

                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Product Image</h6>
                            </div>

                            <div class="col-md-1">

                                <img class="w-15" id="newImg" height="50" style="border-radius: 5px" src="{{ asset('images/default.jpg') }}" />

                            </div>
                            <div class="col-md-9 pe-5">
                                <div class="custom-file">
                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
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

                        <hr class="mx-n3">

                        <!-- ./row -->

                        <div class="row align-items-center py-1 mt-2"> <!--row Start -->
                            <div class="col-md-4 ps-5"> </div>
                            <div class="col-md-3 pe-5">
                                <button type="reset" onclick="resetSummernote()" class="btn btn-default">Reset</button>
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

@push('scripts_product_create')
    <script>
        function updateFileName(input) {
            var fileName = input.files[0].name;
            $('#fileLabel').text(fileName);
        }
    </script>
@endpush
