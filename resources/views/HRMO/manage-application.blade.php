@extends('HRMO.layouts.app')

@section('title', 'Manage Users')

@section('header')
    @include('HRMO.partials.header')
@endsection

@section('left-sidebar')
    @include('HRMO.partials.left-sidebar')
@endsection

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
                        <button class="btn btn-primary ml-3">Add Job Posting</button>
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/images/kinder.png"
                             class="card-img-top" alt="green iguana"/>
                        <div class="card-body">
                            <h4>Teacher 1 - Kindergarten</h4>
                            <p class="card-text">
                            <p>hey sould sister</p>
                            <div>
                                <button class="btn btn-primary w-100" type="button">Share</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/images/kinder.png"
                             class="card-img-top" alt="green iguana"/>
                        <div class="card-body">
                            <h4>Teacher 1 - Kindergarten</h4>
                            <p class="card-text">
                            <p>hey sould sister</p>
                            <div>
                                <button class="btn btn-primary w-100" type="button">Share</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/images/kinder.png"
                             class="card-img-top" alt="green iguana"/>
                        <div class="card-body">
                            <h4>Teacher 1 - Kindergarten</h4>
                            <p class="card-text">
                            <p>hey sould sister</p>
                            <div>
                                <button class="btn btn-primary w-100" type="button">Share</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/images/kinder.png"
                             class="card-img-top" alt="green iguana"/>
                        <div class="card-body">
                            <h4>Teacher 1 - Kindergarten</h4>
                            <p class="card-text">
                            <p>hey sould sister</p>
                            <div>
                                <button class="btn btn-primary w-100" type="button">Share</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/images/kinder.png"
                             class="card-img-top" alt="green iguana"/>
                        <div class="card-body">
                            <h4>Teacher 1 - Kindergarten</h4>
                            <p class="card-text">
                            <p>hey sould sister</p>
                            <div>
                                <button class="btn btn-primary w-100" type="button">Share</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection


@section('js')

@endsection
