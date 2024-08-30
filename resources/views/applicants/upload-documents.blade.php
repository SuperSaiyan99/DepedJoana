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

                @livewire('applicant.document-upload-files')

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
