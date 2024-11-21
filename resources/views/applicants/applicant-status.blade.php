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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endsection

@section('contents')
    <div class="page-inner">
        <div class="container">
            <div class="row">

                @livewire('applicant.forms.applicant-status')

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="https://www.wpromotions.eu/confetti.min.js"></script>


    <script>

        let firstTime = localStorage.getItem("confetti_loaded");

        //TODO: If Backend is developed, make a isNew event
        document.addEventListener('DOMContentLoaded', function () {
            var stepper = new Stepper(document.querySelector('.bs-stepper'))
            if (firstTime != 'yes') {
                // first time loaded!
                localStorage.setItem("confetti_loaded", "yes");
                confetti.start()
                setTimeout(function () {
                    confetti.stop();
                }, 3000)
            }
        })


    </script>
@endsection



