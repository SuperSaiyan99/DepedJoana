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
    <link href="assets2/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets2/libs/@chenfengyuan/datepicker/datepicker.min.css">
@endsection

@section('contents')
    <div class="page-inner">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="form-header">Work Experience Sheet</h4>
                    <hr>
                    <form>
                        <div class="mb-3 mt-5">
                            <label class="form-label">Date Range</label>
                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                <input type="text" class="form-control" name="start" placeholder="Start Date">
                                <input type="text" class="form-control" name="end" placeholder="End Date">
                        </div>
                        <div class="mb-4">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position" name="position" placeholder="Enter position title">
                        </div>
                        <div class="mb-4">
                            <label for="officeUnit" class="form-label">Name of Office/Unit</label>
                            <input type="text" class="form-control" id="officeUnit" name="officeUnit" placeholder="Enter office or unit name">
                        </div>
                        <div class="mb-4">
                            <label for="supervisor" class="form-label">Immediate Supervisor</label>
                            <input type="text" class="form-control" id="supervisor" name="supervisor" placeholder="Enter supervisor name">
                        </div>
                        <div class="mb-4">
                            <label for="agency" class="form-label">Name of Agency/Organization and Location</label>
                            <input type="text" class="form-control" id="agency" name="agency" placeholder="Enter agency or organization name">
                        </div>
                        <div class="mb-4">
                            <label for="accomplishments" class="form-label">List of Accomplishments and Contributions (if any)</label>
                            <textarea class="form-control" id="accomplishments" name="accomplishments" rows="3" placeholder="Enter accomplishments"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="duties" class="form-label">Summary of Actual Duties</label>
                            <textarea class="form-control" id="duties" name="duties" rows="3" placeholder="Enter summary of duties"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Save Work Experience</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="assets2/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets2/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>
@endsection
