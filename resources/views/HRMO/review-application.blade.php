@extends('HRMO.layouts.app')

@section('title', 'Manage Users')

@section('css')
    <style>
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black; /* Change the icon background to black */
        }

        .carousel-control-prev,
        .carousel-control-next {
            filter: invert(1); /* Invert the icon color if needed */
        }
    </style>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-header {
            border-bottom: 2px solid #6c757d;
            margin-bottom: 15px;
            padding-bottom: 10px;
            color: #6c757d;
            font-weight: bold;
        }

        .form-title {
            margin-bottom: 15px;
            padding-bottom: 10px;
            color: #6c757d;
            font-weight: bold;
        }

        .form-label {
            color: #495057;
            font-weight: bold;
        }

        .btn-save {
            background-color: #6f42c1;
            color: white;
        }

        .table {
            border: 3px solid #000; /* Thick border around the table */
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            border: 3px solid #000; /* Thick border for table cells */
        }

        .table-input {
            border: none;
            text-align: center;
            width: 100%;
        }

        .checkbox-container label {
            font-size: 0.9rem;
            font-weight: normal;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 10px;
        }

        input[type=radio] {
            transform: scale(1.5);
        }

    </style>


    <link href="{{ asset('assets2/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                        <h4 class="mb-0">Review Candidates</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Applications</a></li>
                                <li class="breadcrumb-item active">Review Application</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->



           @livewire('management-office.filter-button')



            <!--[contents here]-->
            <div class="row">
                <!-- Sidebar: List of candidates -->
                <div class="col-md-4">
                    @livewire('management-office.applicant-sidebar')
                </div>

                <!-- Main profile section -->
                <div class="col-md-8">
                    @livewire('management-office.applicant-profile')
                </div>
            </div>



        </div>
    </div>
@endsection


@section('js')
    <!-- SweetAlert2 and CKEditor Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
@endsection

