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

                    <!--[navigation tabs]-->
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home" role="tab" aria-controls="pills-home" aria-selected="true">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-family-tab" data-bs-toggle="pill" href="#line-family" role="tab" aria-controls="pills-family" aria-selected="false">Family</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-education-tab" data-bs-toggle="pill" href="#line-education" role="tab" aria-controls="pills-education" aria-selected="false">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-eligibility-tab" data-bs-toggle="pill" href="#line-eligibility" role="tab" aria-controls="pills-eligibility" aria-selected="false">Eligibility/Qualification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-work-experience-tab" data-bs-toggle="pill" href="#line-work-experience" role="tab" aria-controls="pills-work-experience" aria-selected="false">Work Experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-volunteer-tab" data-bs-toggle="pill" href="#line-volunteer" role="tab" aria-controls="pills-volunteer" aria-selected="false">Volunteer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-training-tab" data-bs-toggle="pill" href="#line-training" role="tab" aria-controls="pills-training" aria-selected="false">Training</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-others-tab" data-bs-toggle="pill" href="#line-others" role="tab" aria-controls="pills-others" aria-selected="false">Others</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-questions-tab" data-bs-toggle="pill" href="#line-questions" role="tab" aria-controls="pills-questions" aria-selected="false">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-reference-tab" data-bs-toggle="pill" href="#line-reference" role="tab" aria-controls="pills-reference" aria-selected="false">References</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-others2-tab" data-bs-toggle="pill" href="#line-others2" role="tab" aria-controls="pills-others2" aria-selected="false">Others2</a>
                        </li>
                    </ul>

                    <!--[contents of tab]-->
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="line-home-tab">
                            <form enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="surname" class="form-label">Surname</label>
                                        <input type="text" class="form-control" id="surname" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstname" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="middlename" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middlename" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Date of Birth (yyyy-mm-dd)</label>
                                        <input type="date" class="form-control" id="dob">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="extension" class="form-label">Name Extension</label>
                                        <select class="form-select" id="extension">
                                            <option selected>Select</option>
                                            <option value="Jr">Jr</option>
                                            <option value="Sr">Sr</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birthplace" class="form-label">Place of Birth</label>
                                        <input type="text" class="form-control" id="birthplace" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Residential Address No., Street, Brgy.</label>
                                        <input type="text" class="form-control" id="address" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="region" class="form-label">Region</label>
                                        <select class="form-select" id="region">
                                            <option selected>Select Region</option>
                                            <!-- Options for regions here -->
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="province" class="form-label">Province</label>
                                        <select class="form-select" id="province">
                                            <option selected>Select Province</option>
                                            <!-- Options for provinces here -->
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="municipality" class="form-label">City/Municipality</label>
                                        <select class="form-select" id="municipality">
                                            <option selected>Select Municipality</option>
                                            <!-- Options for municipalities here -->
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="zip" class="form-label">ZIP Code</label>
                                        <input type="text" class="form-control" id="zip" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telephone" class="form-label">Telephone No.</label>
                                        <input type="text" class="form-control" id="telephone" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cellphone" class="form-label">Cellphone No.</label>
                                        <input type="text" class="form-control" id="cellphone" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="citizenship" class="form-label">Citizenship</label>
                                        <input type="text" class="form-control" id="citizenship" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="languages" class="form-label">Languages</label>
                                        <select class="form-select" id="languages" multiple>
                                            <option selected>Select options</option>
                                            <!-- Options for languages here -->
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="height" class="form-label">Height (m)</label>
                                        <input type="text" class="form-control" id="height" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="weight" class="form-label">Weight (kg)</label>
                                        <input type="text" class="form-control" id="weight" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bloodtype" class="form-label">Blood Type</label>
                                        <input type="text" class="form-control" id="bloodtype" placeholder="O+">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">E-mail address</label>
                                        <input type="email" class="form-control" id="email" placeholder="example@domain.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sex" class="form-label">Sex</label>
                                        <select class="form-select" id="sex">
                                            <option selected>Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="civilstatus" class="form-label">Civil Status</label>
                                        <select class="form-select" id="civilstatus">
                                            <option selected>Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="religion" class="form-label">Religion</label>
                                        <input type="text" class="form-control" id="religion" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gsis" class="form-label">GSIS ID No.</label>
                                        <input type="text" class="form-control" id="gsis" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pagibig" class="form-label">PAG-IBIG ID No.</label>
                                        <input type="text" class="form-control" id="pagibig" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="philhealth" class="form-label">PhilHealth No.</label>
                                        <input type="text" class="form-control" id="philhealth" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sss" class="form-label">SSS No.</label>
                                        <input type="text" class="form-control" id="sss" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="employee" class="form-label">Agency Employee No.</label>
                                        <input type="text" class="form-control" id="employee" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tin" class="form-label">TIN</label>
                                        <input type="text" class="form-control" id="tin" placeholder="1234321">
                                    </div>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                    <button type="submit" class="btn btn-save">Save Personal Data</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-family" role="tabpanel" aria-labelledby="line-family-tab">
                            <form>
                                <div class="row g-3">
                                    <div class="form-title">Spouse Information</div>
                                    <div class="col-md-6">
                                        <label for="spouseSurname" class="form-label">Surname</label>
                                        <input type="text" class="form-control" id="spouseSurname" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="spouseFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="spouseFirstName" placeholder="Venz Fredrick">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="spouseMiddleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="spouseMiddleName" placeholder="Naraga">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="spouseExtension" class="form-label">Name Extension</label>
                                        <select class="form-select" id="spouseExtension">
                                            <option selected>Select</option>
                                            <option value="Jr">Jr</option>
                                            <option value="Sr">Sr</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="businessName" class="form-label">Employer/Business Name</label>
                                        <input type="text" class="form-control" id="businessName" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="businessAddress" class="form-label">Business Address</label>
                                        <input type="text" class="form-control" id="businessAddress" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telephone" class="form-label">Telephone No.</label>
                                        <input type="text" class="form-control" id="telephone" placeholder="">
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="form-header mt-5">
                                    Parent's Information
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="fatherSurname" class="form-label">Father's Surname</label>
                                        <input type="text" class="form-control" id="fatherSurname" placeholder="">
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="fatherFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fatherFirstName" placeholder="">
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="fatherMiddleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="fatherMiddleName" placeholder="">
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="fatherExtension" class="form-label">Name Extension</label>
                                        <select class="form-select" id="fatherExtension">
                                            <option selected>Select</option>
                                            <option value="Jr">Jr</option>
                                            <option value="Sr">Sr</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="motherMaidenSurname" class="form-label">Mother's Maiden Name</label>
                                        <input type="text" class="form-control" id="motherMaidenSurname" placeholder="">
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="motherFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="motherFirstName" placeholder="">
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="motherMiddleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="motherMiddleName" placeholder="">
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="form-header mt-5">
                                    Children's Information
                                </div>
                                <div class="repeater">
                                    <div data-repeater-list="group-a">
                                        <div data-repeater-item class="row">
                                            <div  class="mb-3 col-lg-2">
                                                <label class="form-label" for="name">Full Name</label>
                                                <input type="text" id="children_name" name="untyped-input" class="form-control"/>
                                            </div>

                                            <div  class="mb-3 col-lg-2">
                                                <label class="form-label" for="child_dob">Date of Birth</label>
                                                <input type="datetime" id="children_dob" class="form-control"/>
                                            </div>

                                            <div class="col-lg-2 align-self-center">
                                                <div class="d-grid">
                                                    <input data-repeater-delete type="button" class="btn btn-primary" value="Delete"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add"/>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                    <button type="submit" class="btn btn-primary">Save Education Data</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-education" role="tabpanel" aria-labelledby="line-education-tab">
                            <h4 class="mb-4 mt-4">Educational Background</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Level</th>
                                        <th scope="col">Name of School <br>(Write in full)</th>
                                        <th scope="col">Basic Education/Degree/Course <br>(Write in full)</th>
                                        <th scope="col" colspan="2">Period of Attendance</th>
                                        <th scope="col">Highest level/ Units Earned <br>(If not graduated)</th>
                                        <th scope="col">Year Graduated</th>
                                        <th scope="col">Scholarship/Academic Honors Received</th>
                                    </tr>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Elementary</td>
                                        <td><input type="text" class="table-input" name="elementary_school"></td>
                                        <td><input type="text" class="table-input" name="elementary_course"></td>
                                        <td><input type="number" class="table-input" name="elementary_from"></td>
                                        <td><input type="number" class="table-input" name="elementary_to"></td>
                                        <td><input type="text" class="table-input" name="elementary_units"></td>
                                        <td><input type="text" class="table-input" name="elementary_graduated"></td>
                                        <td><input type="text" class="table-input" name="elementary_honors"></td>
                                    </tr>
                                    <tr>
                                        <td>Secondary</td>
                                        <td><input type="text" class="table-input" name="secondary_school"></td>
                                        <td><input type="text" class="table-input" name="secondary_course"></td>
                                        <td><input type="number" class="table-input" name="secondary_from"></td>
                                        <td><input type="number" class="table-input" name="secondary_to"></td>
                                        <td><input type="text" class="table-input" name="secondary_units"></td>
                                        <td><input type="text" class="table-input" name="secondary_graduated"></td>
                                        <td><input type="text" class="table-input" name="secondary_honors"></td>
                                    </tr>
                                    <tr>
                                        <td>Vocational/ Trade Course</td>
                                        <td><input type="text" class="table-input" name="vocational_school"></td>
                                        <td><input type="text" class="table-input" name="vocational_course"></td>
                                        <td><input type="number" class="table-input" name="vocational_from"></td>
                                        <td><input type="number" class="table-input" name="vocational_to"></td>
                                        <td><input type="text" class="table-input" name="vocational_units"></td>
                                        <td><input type="text" class="table-input" name="vocational_graduated"></td>
                                        <td><input type="text" class="table-input" name="vocational_honors"></td>
                                    </tr>
                                    <tr>
                                        <td>College</td>
                                        <td><input type="text" class="table-input" name="college_school"></td>
                                        <td><input type="text" class="table-input" name="college_course"></td>
                                        <td><input type="text" class="table-input" name="college_from"></td>
                                        <td><input type="text" class="table-input" name="college_to"></td>
                                        <td><input type="text" class="table-input" name="college_units"></td>
                                        <td><input type="text" class="table-input" name="college_graduated"></td>
                                        <td><input type="text" class="table-input" name="college_honors"></td>
                                    </tr>
                                    <tr>
                                        <td>Graduate Studies</td>
                                        <td><input type="text" class="table-input" name="graduate_school"></td>
                                        <td><input type="text" class="table-input" name="graduate_course"></td>
                                        <td><input type="number" class="table-input" name="graduate_from"></td>
                                        <td><input type="number" class="table-input" name="graduate_to"></td>
                                        <td><input type="text" class="table-input" name="graduate_units"></td>
                                        <td><input type="text" class="table-input" name="graduate_graduated"></td>
                                        <td><input type="text" class="table-input" name="graduate_honors"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                <button type="submit" class="btn btn-primary">Save Education Data</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-eligibility" role="tabpanel" aria-labelledby="line-eligibility-tab">

                            @livewire('eligibility-form')

                        </div>
                        <div class="tab-pane fade" id="line-work-experience" role="tabpanel" aria-labelledby="line-work-experience-tab">
                            <h4 class="form-header">Work Experience</h4>
                            <form>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="jobTitle" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="jobTitle" name="jobTitle">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="company" class="form-label">Company</label>
                                        <input type="text" class="form-control" id="company" name="company">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Government Service</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="govServiceYes" name="govService" value="Yes">
                                                <label class="form-check-label" for="govServiceYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="govServiceNo" name="govService" value="No">
                                                <label class="form-check-label" for="govServiceNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="salaryGrade" class="form-label">Salary Grade</label>
                                        <input type="text" class="form-control" id="salaryGrade" name="salaryGrade">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="salaryStep" class="form-label">Salary Step</label>
                                        <select class="form-select" id="salaryStep" name="salaryStep">
                                            <option selected>Select</option>
                                            <!-- Add options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startDate" name="startDate">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="endDate" name="endDate">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="currentRole" name="currentRole">
                                            <label class="form-check-label" for="currentRole">I am currently in this role</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="description-area form-control"></textarea>
                                    <div class="text-end text-muted mt-1">0/2000</div>
                                </div>
                                <div class="d-grid">
                                    <button type="button" class="btn btn-custom">Add Work Experience</button>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                    <button type="submit" class="btn btn-save">Save Work Exp. data</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-volunteer" role="tabpanel" aria-labelledby="line-volunteer-tab">
                            <h4 class="form-header">Voluntary Work or Involvement in Civic / Non-Government / People / Voluntary Organizations</h4>
                            <form id="voluntaryWorkRepeater">
                                <div data-repeater-list="voluntaryWork">
                                    <div data-repeater-item class="repeater-item">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="organization" class="form-label">Name & Address of Organization (Write in full)</label>
                                                <input type="text" class="form-control" id="organization" name="organization">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="fromDate" class="form-label">From (mm/dd/yyyy)</label>
                                                <input type="date" class="form-control" id="fromDate" name="fromDate">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="toDate" class="form-label">To (mm/dd/yyyy)</label>
                                                <input type="date" class="form-control" id="toDate" name="toDate">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label for="hours" class="form-label">Number of Hours</label>
                                                <input type="number" class="form-control" id="hours" name="hours">
                                            </div>
                                            <div class="col-md-9">
                                                <label for="position" class="form-label">Position / Nature of Work</label>
                                                <input type="text" class="form-control" id="position" name="position">
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="button" data-repeater-delete class="btn btn-danger mt-3">Delete Entry</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="button" data-repeater-create class="btn btn-custom mt-3">Add Voluntary Work</button>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                    <button type="submit" class="btn btn-save">Save Voluntary Work</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-training" role="tabpanel" aria-labelledby="line-training-tab">
                            <h4 class="form-header">Learning and Development (L&D) Interventions/Training Programs Attended</h4>
                            <form id="ldProgramsRepeater">
                                <div data-repeater-list="ldPrograms">
                                    <div data-repeater-item class="repeater-item">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="programTitle" class="form-label">Title of Learning and Development Interventions/Training Programs (Write in full)</label>
                                                <input type="text" class="form-control" id="programTitle" name="programTitle">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="fromDate" class="form-label">From (mm/dd/yyyy)</label>
                                                <input type="date" class="form-control" id="fromDate" name="fromDate">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="toDate" class="form-label">To (mm/dd/yyyy)</label>
                                                <input type="date" class="form-control" id="toDate" name="toDate">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label for="hours" class="form-label">Number of Hours</label>
                                                <input type="number" class="form-control" id="hours" name="hours">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="typeOfLD" class="form-label">Type of LD (Managerial/Supervisory/Technical/etc.)</label>
                                                <input type="text" class="form-control" id="typeOfLD" name="typeOfLD">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="conductedBy" class="form-label">Conducted/Sponsored By (Write in full)</label>
                                                <input type="text" class="form-control" id="conductedBy" name="conductedBy">
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="button" data-repeater-delete class="btn btn-danger mt-3">Delete Entry</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="button" data-repeater-create class="btn btn-custom mt-3">Add Learning & Development Program</button>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                    <button type="submit" class="btn btn-save">Save Learning & Development Programs</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-others" role="tabpanel" aria-labelledby="line-others-tab">
                            <h4 class="form-header">Other Information</h4>
                            <form id="otherInfoRepeater">
                                <div data-repeater-list="otherInfo">
                                    <div data-repeater-item class="repeater-item">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="skills" class="form-label">Special Skills and Hobbies</label>
                                                <input type="text" class="form-control" id="skills" name="skills">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="recognition" class="form-label">Non-Academic Distinctions/Recognition</label>
                                                <input type="text" class="form-control" id="recognition" name="recognition">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="membership" class="form-label">Membership in Association/Organization</label>
                                                <input type="text" class="form-control" id="membership" name="membership">
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="button" data-repeater-delete class="btn btn-danger mt-3">Delete Entry</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="button" data-repeater-create class="btn btn-custom mt-3">Add Other Information</button>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                    <button type="submit" class="btn btn-save">Save Other Information</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-questions" role="tabpanel" aria-labelledby="line-questions-tab">
                            <form>
                                <div class="mb-4">
                                    <label class="form-label">34. Are you related by consanguinity or affinity to the appointing or recommending chief of bureau or office or to the person who has immediate supervision over you in the Bureau or Department where you will be appointed:</label>
                                    <div class="ms-3">
                                        <label class="form-label">a. within the third degree?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q34a" id="q34aYes" value="Yes">
                                            <label class="form-check-label" for="q34aYes">Yes</label>
                                            <input class="form-check-input ms-3" type="radio" name="q34a" id="q34aNo" value="No">
                                            <label class="form-check-label" for="q34aNo">No</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q34aDetails">
                                    </div>
                                    <div class="ms-3 mt-3">
                                        <label class="form-label">b. within the fourth degree (for Local Government Unit - Career Employees)?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q34b" id="q34bYes" value="Yes">
                                            <label class="form-check-label" for="q34bYes">Yes</label>
                                            <input class="form-check-input ms-3" type="radio" name="q34b" id="q34bNo" value="No">
                                            <label class="form-check-label" for="q34bNo">No</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q34bDetails">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">35. a. Have you ever been found guilty of any administrative offense?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q35a" id="q35aYes" value="Yes">
                                        <label class="form-check-label" for="q35aYes">Yes</label>
                                        <input class="form-check-input ms-3" type="radio" name="q35a" id="q35aNo" value="No">
                                        <label class="form-check-label" for="q35aNo">No</label>
                                    </div>
                                    <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q35aDetails">

                                    <div class="mt-3">
                                        <label class="form-label">b. Have you been criminally charged before any court?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q35b" id="q35bYes" value="Yes">
                                            <label class="form-check-label" for="q35bYes">Yes</label>
                                            <input class="form-check-input ms-3" type="radio" name="q35b" id="q35bNo" value="No">
                                            <label class="form-check-label" for="q35bNo">No</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q35bDetails">
                                        <input type="datetime" class="form-control mt-2" placeholder="Date Filed:" name="q35bDateFiled">
                                        <input type="text" class="form-control mt-2" placeholder="Status of Case/s:" name="q35bStatus">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q36" id="q36Yes" value="Yes">
                                        <label class="form-check-label" for="q36Yes">Yes</label>
                                        <input class="form-check-input ms-3" type="radio" name="q36" id="q36No" value="No">
                                        <label class="form-check-label" for="q36No">No</label>
                                    </div>
                                    <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q36Details">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q37" id="q37Yes" value="Yes">
                                        <label class="form-check-label" for="q37Yes">Yes</label>
                                        <input class="form-check-input ms-3" type="radio" name="q37" id="q37No" value="No">
                                        <label class="form-check-label" for="q37No">No</label>
                                    </div>
                                    <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q37Details">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q38a" id="q38aYes" value="Yes">
                                        <label class="form-check-label" for="q38aYes">Yes</label>
                                        <input class="form-check-input ms-3" type="radio" name="q38a" id="q38aNo" value="No">
                                        <label class="form-check-label" for="q38aNo">No</label>
                                    </div>
                                    <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q38aDetails">

                                    <div class="mt-3">
                                        <label class="form-label">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q38b" id="q38bYes" value="Yes">
                                            <label class="form-check-label" for="q38bYes">Yes</label>
                                            <input class="form-check-input ms-3" type="radio" name="q38b" id="q38bNo" value="No">
                                            <label class="form-check-label" for="q38bNo">No</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" placeholder="If YES, give details:" name="q38bDetails">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">39. Have you acquired the status of an immigrant or permanent resident of another country?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q39" id="q39Yes" value="Yes">
                                        <label class="form-check-label" for="q39Yes">Yes</label>
                                        <input class="form-check-input ms-3" type="radio" name="q39" id="q39No" value="No">
                                        <label class="form-check-label" for="q39No">No</label>
                                    </div>
                                    <input type="text" class="form-control mt-2" placeholder="If YES, give details (country):" name="q39Details">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972):</label>
                                    <div class="ms-3">
                                        <label class="form-label">a. Are you a member of any indigenous group?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q40a" id="q40aYes" value="Yes">
                                            <label class="form-check-label" for="q40aYes">Yes</label>
                                            <input class="form-check-input ms-3" type="radio" name="q40a" id="q40aNo" value="No">
                                            <label class="form-check-label" for="q40aNo">No</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" placeholder="If YES, please specify:" name="q40aDetails">
                                    </div>

                                    <div class="ms-3 mt-3">
                                        <label class="form-label">b. Are you a person with disability?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q40b" id="q40bYes" value="Yes">
                                            <label class="form-check-label" for="q40bYes">Yes</label>
                                            <input class="form-check-input ms-3" type="radio" name="q40b" id="q40bNo" value="No">
                                            <label class="form-check-label" for="q40bNo">No</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" placeholder="If YES, please specify ID No:" name="q40bDetails">
                                    </div>

                                    <div class="ms-3 mt-3">
                                        <label class="form-label">c. Are you a solo parent?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q40c" id="q40cYes" value="Yes">
                                            <label class="form-check-label" for="q40cYes">Yes</label>
                                            <input class="form-check-input ms-3" type="radio" name="q40c" id="q40cNo" value="No">
                                            <label class="form-check-label" for="q40cNo">No</label>
                                        </div>
                                        <input type="text" class="form-control mt-2" placeholder="If YES, please specify ID No:" name="q40cDetails">
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-save">Save Questionnaire</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-reference" role="tabpanel" aria-labelledby="line-reference-tab">
                            <h4 class="form-header">References</h4>
                            <p class="form-note text-danger"><i>Person not related by consanguinity or affinity to applicant/appointee</i></p>
                            <form id="referencesRepeater">
                                <div data-repeater-list="references">
                                    <div data-repeater-item class="repeater-item">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="telNo" class="form-label">Tel. No.</label>
                                                <input type="text" class="form-control" id="telNo" name="telNo">
                                            </div>
                                        </div>
                                        <button type="button" data-repeater-delete class="btn btn-danger mt-3">Delete Entry</button>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="button" data-repeater-create class="btn btn-primary">Add Reference</button>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary">Save and Edit Later</button>
                                    <button type="submit" class="btn btn-save">Save References</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-others2" role="tabpanel" aria-labelledby="line-others2-tab">
                            <h4 class="form-header">Declaration</h4>
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="govIssuedID" class="form-label">Government Issued ID</label>
                                        <input type="text" class="form-control" id="govIssuedID" placeholder="e.g., Passport, GSIS, SSS, PRC, Driver's License">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="idNumber" class="form-label">ID/License/Passport No.</label>
                                        <input type="text" class="form-control" id="idNumber" placeholder="Please indicate ID Number">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dateAccomplished" class="form-label">Date Accomplished</label>
                                        <input type="date" class="form-control" id="dateAccomplished">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="datePlaceIssued" class="form-label">Date/Place of Issuance</label>
                                        <input type="text" class="form-control" id="datePlaceIssued" placeholder="Enter Date and Place of Issuance">
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="signatureUpload" class="form-label">Signature</label>
                                            <div class="dropzone" id="signatureUpload">
                                                <div class="dz-message">Drop or click to upload signature</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="thumbmarkUpload" class="form-label">Right Thumbmark</label>
                                        <div class="dropzone" id="thumbmarkUpload">
                                            <div class="dz-message">Drop or click to upload thumbmark</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label for="photoUpload" class="form-label">ID Picture (4.5 cm x 3.5 cm)</label>
                                        <div class="dropzone" id="photoUpload">
                                            <div class="dz-message">Drop or click to upload ID picture</div>
                                        </div>
                                        <span class="note">ID picture taken within the last 6 months. Computer-generated or photocopied picture is not acceptable.</span>
                                    </div>
                                </div>
                                <div class="checkbox-container mt-4 mb-4">
                                    <input type="checkbox" id="declareOath" required>
                                    <span for="declareOath">
                                        I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. I agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal cases against me.
                                    </span>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-save">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- plugins -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone-min.min.js"></script>


    <!--[child repeater]--->
    <script>
        $(document).ready(function () {
            $('.repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'children_name': '',
                    'children_dob': '',
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this entry?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {

                }
            });
        });
    </script>

    <!--[eligibility repeater]--->
    <script>
        $(document).ready(function () {
            $('#eligibilityRepeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'career_service': '',
                    'eligibility_rating': '',
                    'date_of_exam': '',
                    'place_of_exam': '',
                    'license_number': '',
                    'date_of_validity': ''
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this entry?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {
                    // Repeater is ready
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#voluntaryWorkRepeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'organization': '',
                    'fromDate': '',
                    'toDate': '',
                    'hours': '',
                    'position': ''
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this entry?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {
                    // Repeater is ready
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#ldProgramsRepeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'programTitle': '',
                    'fromDate': '',
                    'toDate': '',
                    'hours': '',
                    'typeOfLD': '',
                    'conductedBy': ''
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this entry?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {
                    // Repeater is ready
                }
            });
        });
    </script>

    <script>
        // Disable auto discover for all elements
        Dropzone.autoDiscover = false;

        // Signature Dropzone
        var signatureDropzone = new Dropzone("#signatureUpload", {
            url: "/upload-signature", // Change this URL to your actual upload handler
            maxFiles: 1,
            acceptedFiles: ".png,.jpg,.jpeg,.pdf",
            dictDefaultMessage: "Drop or click to upload signature",
            init: function() {
                this.on("success", function(file, response) {
                    console.log("Signature uploaded successfully.");
                });
            }
        });

        // Thumbmark Dropzone
        var thumbmarkDropzone = new Dropzone("#thumbmarkUpload", {
            url: "/upload-thumbmark", // Change this URL to your actual upload handler
            maxFiles: 1,
            acceptedFiles: ".png,.jpg,.jpeg,.pdf",
            dictDefaultMessage: "Drop or click to upload thumbmark",
            init: function() {
                this.on("success", function(file, response) {
                    console.log("Thumbmark uploaded successfully.");
                });
            }
        });

        // ID Picture Dropzone
        var photoDropzone = new Dropzone("#photoUpload", {
            url: "/upload-photo", // Change this URL to your actual upload handler
            maxFiles: 1,
            acceptedFiles: ".png,.jpg,.jpeg",
            dictDefaultMessage: "Drop or click to upload ID picture",
            init: function() {
                this.on("success", function(file, response) {
                    console.log("Photo uploaded successfully.");
                });
            }
        });
    </script>
@endsection
