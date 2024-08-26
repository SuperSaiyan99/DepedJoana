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

@endsection

@section('contents')
    <div class="page-inner">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Welcome, Joana!</h4>
                </div>

                <div class="card-body">
                    <div class="container text-center">
                        <img src="" alt="">
                        <h1 class="header-text">Welcome to Job Opening and Applicant Network Automation (JOANA)</h1>
                        <p class="sub-header-text">Note: You must apply to at least one position before submitting your PDS to acquire a Unique Applicant. Fill-up the form below.</p>
                        <button class="btn btn-primary btn-lg">Update PDS</button>
                    </div>
                </div>

                <div class="m-5">
                    <h1 class="text-center">What are you applying for?</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th>Office Level</th>
                                <th>CO Strands/Region</th>
                                <th>CO Bureau/Service/Office - Division/Division Office</th>
                                <th>Position</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <select id="officeLevel" class="form-select">
                                        <option selected disabled>Select Level</option>
                                        <option value="central">Central Office</option>
                                        <option value="regional">Regional Office</option>
                                        <option value="division">Division Office</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="strandsRegion" class="form-select">
                                        <option selected disabled>Select Strands/Region</option>
                                        <option value="central">Central Office</option>
                                        <option value="regional">Regional Office</option>
                                        <option value="division">Division Office</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="bureauOffice" class="form-select">
                                        <option selected disabled>Select Bureau/Service/Office</option>
                                        <option value="office1">Office 1</option>
                                        <option value="office2">Office 2</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="position" class="form-select">
                                        <option selected disabled>Select Position</option>
                                        <option value="position1">Position 1</option>
                                        <option value="position2">Position 2</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="action-buttons d-flex justify-content-center">
                        <button class="btn btn-secondary me-2">Add</button>
                        <button class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
