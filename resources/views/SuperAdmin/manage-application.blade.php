@extends('SuperAdmin.layouts.app')

@section('title', 'Manage Users')

@section('header')
    @include('SuperAdmin.partials.header')
@endsection

@section('sidebar')
    @include('SuperAdmin.partials.sidebar')
@endsection

@section('left-sidebar')
    @include('SuperAdmin.partials.left-sidebar')
@endsection

@section('css')
    <link href="{{ secure_asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ secure_asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ secure_asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Manage Applications</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Applications</a></li>
                                <li class="breadcrumb-item active">Manage Applications</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="justify-content-start">
                                <button type="button" class="btn btn-primary waves-effect waves-light"><i
                                        class="mdi mdi-account-edit"></i> Add Roles
                                </button>
                                <button type="button" class="btn btn-info waves-effect waves-light"><i
                                        class="mdi mdi-account-edit"></i> Add Permissions
                                </button>
                            </div>
                            <br>
                            <table id="datatable" class="table table-striped table-bordered dt-responsive "
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>Admin</td>
                                    <td>Create, Read, Update, Delete</td>
                                    <td>
                                        <button type="button" class="btn btn-danger waves-effect waves-light"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="btn btn-info waves-effect waves-light"><i
                                                class="mdi mdi-account-edit"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>SuperAdmin</td>
                                    <td>Create, Read, Update, Delete</td>
                                    <td>
                                        <button type="button" class="btn btn-danger waves-effect waves-light"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="btn btn-info waves-effect waves-light"><i
                                                class="mdi mdi-account-edit"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

@endsection


@section('js')
    <!-- Required datatable js -->
    <script src="{{ secure_asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ secure_asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ secure_asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ secure_asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script
        src="{{ secure_asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ secure_asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
