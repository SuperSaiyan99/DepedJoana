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
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
@endsection

@section('contents')
    <div class="page-inner">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Document File Upload</h4>
                </div>

                <div class="card-body">
                    <h5 class="card-title-desc text-danger">
                        <i class="fa fa-exclamation-circle me-2"></i> Important Reminder!
                    </h5>

                    <div class="alert alert-warning" role="alert">
                        <h6 class="alert-heading"><i class="fa fa-info-circle me-2"></i> Please Note:</h6>
                        <ul class="mb-0">
                            <li>All uploaded documents must be in PDF format.</li>
                            <li>Make sure your documents are clear and legible.</li>
                            <li>Ensure that the file size does not exceed 5MB.</li>
                            <li>Do not upload scanned images of documents; original digital documents are preferred.</li>
                        </ul>
                    </div>

                    <div class="alert alert-info" role="alert">
                        <h6 class="alert-heading"><i class="fa fa-check-circle me-2"></i> What to Upload:</h6>
                        <ul class="mb-0">
                            <li>Photocopy of valid and updated PRC License/ID, if applicable</li>

                            <li>Photocopy of Certificate of Eligibility/Report of Rating, if applicable</li>

                            <li>Photocopy of scholastic/academic record such as but not limited to Transcript of Records (TOR) and Diploma, including completion of graduate and post-graduate units/degrees, if available  </li>

                            <li>Photocopy of Certificate/s of Training, if applicable</li>

                            <li>Photocopy of Certificate of Employment, Contract of Service, or duly signed Service Record, whichever is/are applicable</li>

                            <li>Photocopy of latest appointment, if applicable</li>

                            <li>Photocopy of the Performance Ratings in the last rating period(s) covering one (1) year performance prior to the deadline of submission, if applicable</li>

                            <li>Checklist of Requirements and Omnibus Sworn Statement on the Certification on the Authenticity and Veracity (CAV) of the documents submitted and Data Privacy Consent Form</li>

                            <li>Any other required documents specific to your application</li>

                            <li>Government-issued IDs (e.g., Passport, Driver's License)</li>

                            <li>Recent utility bill as proof of address</li>
                        </ul>
                    </div>

                    <div>

                        @livewire('applicant.tab-contents.document-upload-files')

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('dropzone-id').addEventListener('click', function(){
            document.getElementById('file-upload').click()
        })
    </script>
@endsection
