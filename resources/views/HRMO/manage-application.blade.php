@extends('HRMO.layouts.app')

@section('title', 'Manage Users')

@section('css')

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
                        <div class="page-title-right d-flex align-items-center">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Applications</a></li>
                                <li class="breadcrumb-item active">Review Application</li>
                            </ol>
                        </div>
                    </div>
                    <div class="d-flex align-items-end">
                        <button class="btn btn-primary m-1">Add Job Posting</button>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-12">
                <!-- Add Button -->

                <!-- Filter and Sort by section -->
                <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-search m-2"></i>
                        <label for="filter" class="m-2">Filter by</label>
                        <select id="filter" class="form-select form-select-sm" style="width: auto;">
                            <option selected>All (19)</option>
                            <option value="1">Active</option>
                            <option value="2">Closed</option>
                            <option value="3">Pending</option>
                        </select>
                    </div>


                    <!-- Sort by section -->
                    <div class="d-flex align-items-center">
                        <label for="sort" class="me-2">Sort by</label>
                        <select id="sort" class="form-select form-select-sm" style="width: auto;">
                            <option selected>Latest published</option>
                            <option value="1">Oldest published</option>
                            <option value="2">A-Z</option>
                            <option value="3">Z-A</option>
                        </select>
                    </div>
                </div>
            </div>


            <!--[contents here]-->
            @livewire('management-office.job-posting-cards')


        </div>
    </div>

@endsection


@section('js')

@endsection
