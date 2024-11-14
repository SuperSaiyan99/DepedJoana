@extends('HRMO.layouts.app')

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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
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
                                <h4 class="mb-1 mt-1"><span>{{ 6969 }}</span></h4>
                                <p class="text-muted mb-0">Total Candidates</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                        class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week </p>
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
                                <p class="text-muted mb-0">Position Open</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                        class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week </p>
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
                                <p class="text-muted mb-0">Customers</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                        class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week </p>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">+ <span>12.58</span>%</h4>
                                <p class="text-muted mb-0">Growth</p>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                        class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week </p>
                        </div>
                    </div>
                </div>
                <!-- end col-->
            </div>

            <div class="row">

                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Digos City Map</h4>
                            <p class="card-title-dsec">Candidates Location</p>
                            <div id="map" style="width: auto; height: 31.25rem"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end col-->

                <div class="col-xl-5">
                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="float-end">
                                <div class="dropdown">
                                    <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2"
                                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">
                                            All Members
                                            <i class="mdi mdi-chevron-down ms-1"></i>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item" href="#">
                                            Locations
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Revenue
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Join Date
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <h4 class="card-title mb-4">Hiring Activitiy</h4>
                            <div class="table-responsive">
                                <table class="table table-borderless table-centered table-nowrap">
                                    <tbody>
                                    <tr>
                                        <td style="width: 20px;"><img
                                                src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg"
                                                class="avatar-xs rounded-circle " alt="...">
                                        </td>
                                        <td>
                                            <h6 class="font-size-15 mb-1 fw-normal">Juan Makatigbas</h6>
                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i>
                                                Kidapawan City</p>
                                        </td>
                                        <td class="font-size-15 mb-1 fw-normal">January 15, 1999</td>

                                        <td><span class="badge bg-soft-danger font-size-12">Senior Developer</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20px;"><img
                                                src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg"
                                                class="avatar-xs rounded-circle " alt="...">
                                        </td>
                                        <td>
                                            <h6 class="font-size-15 mb-1 fw-normal">Juan Makatigbas</h6>
                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i>
                                                Kidapawan City</p>
                                        </td>
                                        <td class="font-size-15 mb-1 fw-normal">January 15, 1999</td>

                                        <td><span class="badge bg-soft-danger font-size-12">Senior Developer</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="width: 20px;"><img
                                                src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg"
                                                class="avatar-xs rounded-circle " alt="...">
                                        </td>
                                        <td>
                                            <h6 class="font-size-15 mb-1 fw-normal">Juan Makatigbas</h6>
                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i>
                                                Kidapawan City</p>
                                        </td>
                                        <td class="font-size-15 mb-1 fw-normal">January 15, 1999</td>

                                        <td><span class="badge bg-soft-danger font-size-12">Senior Developer</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="width: 20px;"><img
                                                src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg"
                                                class="avatar-xs rounded-circle " alt="...">
                                        </td>
                                        <td>
                                            <h6 class="font-size-15 mb-1 fw-normal">Juan Makatigbas</h6>
                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i>
                                                Kidapawan City</p>
                                        </td>
                                        <td class="font-size-15 mb-1 fw-normal">January 15, 1999</td>

                                        <td><span class="badge bg-soft-danger font-size-12">Senior Developer</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="width: 20px;"><img
                                                src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg"
                                                class="avatar-xs rounded-circle " alt="...">
                                        </td>
                                        <td>
                                            <h6 class="font-size-15 mb-1 fw-normal">Juan Makatigbas</h6>
                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i>
                                                Kidapawan City</p>
                                        </td>
                                        <td class="font-size-15 mb-1 fw-normal">January 15, 1999</td>

                                        <td><span class="badge bg-soft-danger font-size-12">Senior Developer</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20px;"><img
                                                src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg"
                                                class="avatar-xs rounded-circle " alt="...">
                                        </td>
                                        <td>
                                            <h6 class="font-size-15 mb-1 fw-normal">Juan Makatigbas</h6>
                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i>
                                                Kidapawan City</p>
                                        </td>
                                        <td class="font-size-15 mb-1 fw-normal">January 15, 1999</td>

                                        <td><span class="badge bg-soft-danger font-size-12">Senior Developer</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="width: 20px;"><img
                                                src="https://static.vecteezy.com/system/resources/thumbnails/002/387/693/small_2x/user-profile-icon-free-vector.jpg"
                                                class="avatar-xs rounded-circle " alt="...">
                                        </td>
                                        <td>
                                            <h6 class="font-size-15 mb-1 fw-normal">Juan Makatigbas</h6>
                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i>
                                                Kidapawan City</p>
                                        </td>
                                        <td class="font-size-15 mb-1 fw-normal">January 15, 1999</td>

                                        <td><span class="badge bg-soft-danger font-size-12">Senior Developer</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- data-sidebar-->
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>


            </div>
        </div> <!-- container-fluid -->
        <!-- End Page-content -->

        @endsection

        @section('js')
            <script>

                // Initialize the map and set view to Digos City
                var map = L.map('map').setView([6.8022, 125.3573], 12);  // 13 is a zoom level that will show city-level detail

                // Add OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var barangays = [
                    {name: "Aplaya", latLng: [6.73587, 125.37752]}, //
                    {name: "Balabag", latLng: [6.81326, 125.27761]},//
                    {name: "San Jose (Balutakay)", latLng: [6.7333747, 125.3549172]}, //
                    {name: "Binaton", latLng: [6.83721, 125.35237]},//
                    {name: "Cogon", latLng: [6.7598834, 125.3707074]},//
                    {name: "Colorado", latLng: [6.7600511, 125.2932735]},//
                    {name: "Dawis", latLng: [6.7293250, 125.3641502]},//
                    {name: "Dulangan", latLng: [6.8005714, 125.3100492]},//
                    {name: "Goma", latLng: [6.81275, 125.28671]},//
                    {name: "Igpit", latLng: [6.7338200, 125.3284400]},
                    {name: "Kiagot", latLng: [6.7729952, 125.3641772]},
                    {name: "Lungag", latLng: [6.7915786, 125.2762655]},
                    {name: "Mahayahay", latLng: [6.7993183, 125.2908848]},
                    {name: "Matti", latLng: [6.7677750, 125.3061960]},
                    {name: "Kapatagan (Rizal)", latLng: [6.9281, 125.3430]},
                    {name: "Ruparan", latLng: [6.7796847, 125.3305705]},
                    {name: "San Agustin", latLng: [6.7684372, 125.3209376]},
                    {name: "San Miguel (Odaca)", latLng: [6.73545, 125.34585]},
                    {name: "San Roque", latLng: [6.79877, 125.34722]},
                    {name: "Sinawilan", latLng: [6.7699344, 125.3827357]},
                    {name: "Soong", latLng: [6.8135786, 125.3550978]},
                    {name: "Tiguman", latLng: [6.7577423, 125.3221418]},
                    {name: "Tres De Mayo", latLng: [6.7648775, 125.3334187]},
                    {name: "Zone 1 (Pob.)", latLng: [6.7581506, 125.3561389]},
                    {name: "Zone 2 (Pob.)", latLng: [6.7512212, 125.3557393]},
                    {name: "Zone 3", latLng: [6.7448059, 125.3555475]}
                ];


                // TODO: FOREACH PHP DATA HERE INSTEAD OF JS FOREACH
                barangays.forEach(function (barangay) {
                    L.marker(barangay.latLng).addTo(map)
                        .bindPopup('Total applicants of ' + barangay.name + ' : 9000');
                });

            </script>
@endsection
