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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
@endsection

@section('contents')
    <div class="page-inner">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="form-header">Work Experience Sheet</h4>
                    <hr>

                    @livewire('applicant.forms.work-experience-sheet-form')


                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="assets2/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets2/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>

    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
            }
        }
    </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            Autoformat
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                plugins: [ Essentials, Bold, Italic, Font, Paragraph, Autoformat],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'numberedList', 'bulletedList' // No need for the extra `items` property here
                ]
            } )
    </script>
@endsection
