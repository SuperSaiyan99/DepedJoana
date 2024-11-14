@extends('AppointingOfficer.layouts.app')

@section('title', 'Dashboard')

@section('css')
    <style>
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .text-muted {
            font-size: 0.9rem;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
                        <h4 class="mb-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Vertical</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <!-- end page title -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="total-revenue-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span>6,969</span></h4>
                                <p class="text-muted mb-0">Total Applicants</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="orders-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span>5,643</span></h4>
                                <p class="text-muted mb-0">Open Positions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="customers-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span>45,254</span></h4>
                                <p class="text-muted mb-0">Pending Appointments</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Actionable Insights</h4>
                            <p class="card-title-desc">Stay informed and take action with these key insights.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Position</th>
                                        <th scope="col">Appointee</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Teacher I</td>
                                        <td>Juan Dela Cruz</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <td>Master Teacher II</td>
                                        <td>Maria Clara</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>Master Teacher II</td>
                                        <td>Maria Clara</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>Master Teacher II</td>
                                        <td>Maria Clara</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>Master Teacher II</td>
                                        <td>Maria Clara</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div> </div> </div>
                <!-- end col-->

                <div class="col-xl-5">
                    <div class="card h-auto">
                        <div class="card-header">
                            <h5 class="card-title">Pending Positions</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Position</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Teacher I - (Senior High School)</td>
                                        <td>October 26, 2024</td>
                                        <td><span class="badge bg-success">Waiting for Review</span></td>
                                    </tr>
                                    <tr>
                                        <td>Teacher I - (Senior High School)</td>
                                        <td>October 26, 2024</td>
                                        <td><span class="badge bg-success">Waiting for Review</span></td>
                                    </tr>
                                    <tr>
                                        <td>Teacher I - (Senior High School)</td>
                                        <td>October 26, 2024</td>
                                        <td><span class="badge bg-success">Waiting for Review</span></td>
                                    </tr>
                                    <tr>
                                        <td>Teacher I - (Senior High School)</td>
                                        <td>October 26, 2024</td>
                                        <td><span class="badge bg-success">Waiting for Review</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                @livewire('appointing-officer.demographics.recruitment-trends-and-demographics')
            </div>


        </div> <!-- container-fluid -->
        <!-- End Page-content -->

        @endsection

@section('js')

@endsection
