<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/style.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <!-- Responsive extension CSS and JS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">



</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('backend.components.header')

        @include('backend.components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{-- @include('backend.components.breadcrumbs') --}}


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        @include('backend.components.footer')


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap -->

    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->

    <script src="{{ asset('assets/backend/dist/js/adminlte.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- OPTIONAL SCRIPTS -->

    <script src="{{ asset('assets/backend/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- <script src="{{ asset('assets/backend/dist/js/demo.js') }}"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/backend/dist/js/pages/dashboard3.js') }}"></script>
    <!-- Other script tags... -->

    <!-- Responsive extension CSS and JS For Select Search -->
    <script asp-append-version="true" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


    @stack('scripts_product_create')
    @stack('scripts_stock_create')
    @stack('scripts_job_create')

    <script>
        $(document).ready(function() {

            new DataTable('#DataAllList', {
                info: true,
                order: [
                    [0, 'asc']
                ],
                paging: true,
                pageLength: 15, // Set the number of rows per page
                lengthMenu: [15, 25, 50, 100], // Customize the length menu if needed
                responsive: true
            });


            $('#SelectSearch').select2({
                placeholder: 'Select an option',
                allowClear: true,
                responsive: true

            });

            // Get the Summernote content
            var summernoteContent = $('#summernote').summernote('code');

            // Set the Summernote content to the hidden input
            $('#content_details').val(summernoteContent);


            $('#summernote').summernote({
                disableReturn: true,
                height: 300,
            });



        });

        function resetSummernote() {
            // Reset Summernote content
            $('#summernote').summernote('code', '');

            // Reset hidden input value
            $('#content_details').val('');

        }

        // Delete Confirmation
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = document.getElementById('delete-form').getAttribute('action');

            Swal.fire({
                title: "Are you sure to Delete this post",
                text: "You will not be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>



</body>

</html>
