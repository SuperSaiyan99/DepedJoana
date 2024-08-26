@extends('applicants.layouts.app')

@section('navigation')
    @include('applicants.partials.navigation')
@endsection

@section('main-header-logo')
    @include('applicants.partials.main-header-logo')
@endsection

@section('sidebar')
    @include('applicants.partials.sidebar')
@endsection


@section('css')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-header {
            border-bottom: 2px solid #6c757d;
            margin-bottom: 15px;
            padding-bottom: 10px;
            color: #6c757d;
            font-weight: bold;
        }
        .form-title{
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
        .table{
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

    </style>

    <link href="https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone.min.css" rel="stylesheet">

@endsection

@section('contents')
    <div class="page-inner">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Personal Data Sheet</h4>
                </div>

                <div class="card-body">



                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
