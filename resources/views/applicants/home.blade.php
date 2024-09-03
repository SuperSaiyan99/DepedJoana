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
                        <p class="sub-header-text text-danger"><i>Note: You must apply to at least one position before submitting your PDS to acquire a Unique Applicant Identification. Fill-up the form below.</i></p>
                    </div>
                </div>

                <div class="container mt-4">
                    <h3 class="text-center mb-4">What are you applying for?</h3>

                    @livewire('applicant.forms.add-positions')

                </div>
            </div>
        </div>

@endsection

@section('js')

@endsection
