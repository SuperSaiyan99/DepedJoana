@extends('AppointingOfficer.layouts.app')

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

        .mm-active .active{
            color:#000000!important
        }


    </style>


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

            <!--[contents here]-->
            @livewire('appointing-officer.review-candidate-cards')


        </div>
    </div>

@endsection


@section('js')


@endsection
