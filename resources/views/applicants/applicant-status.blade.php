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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="p-3">
                                <h3 class="text-center">Unique Application Number #<strong><i>{{ 339 }}</i></strong></h3>
                                <div id="stepper1" class="bs-stepper linear">
                                    <div class="bs-stepper-header" role="tablist">
                                        <div class="step active" data-target="#test-l-1">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1" aria-selected="true">
                                                <span class="spinner-grow text-primary"></span>
                                                <span class="bs-stepper-label d-none d-md-inline">Application Reviewed</span>
                                            </button>
                                        </div>
                                        <div class="bs-stepper-line"></div>
                                        <div class="step" data-target="#test-l-2">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2" aria-selected="false" disabled="disabled">
                                                <i class="fas fa-hourglass-half"></i>
                                                <span class="bs-stepper-label d-none d-md-inline">Initial Interview Phase</span>
                                            </button>
                                        </div>
                                        <div class="bs-stepper-line"></div>
                                        <div class="step" data-target="#test-l-3">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3" aria-selected="false" disabled="disabled">
                                                <i class="fas fa-clock"></i>
                                                <span class="bs-stepper-label d-none d-md-inline">Assessment Phase</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bs-stepper-content">
                                        <form>
                                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane active dstepper-block" aria-labelledby="stepper1trigger1">
                                                <div class="form-group">
                                                    <h4 class="text-center">Your process has been reviewed</h4>
                                                    <p class="text-center">If you have passed, you will receive further instructions soon.</p>
                                                </div>
                                            </div>
                                            <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
                                                <div class="form-group">
                                                    <h4 class="text-center">Will you marry me, Joana? Hehe</h4>
                                                </div>
                                            </div>
                                            <div id="test-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                                                <button class="btn btn-primary mt-3" onclick="stepper1.previous()">Previous</button>
                                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="https://www.wpromotions.eu/confetti.min.js"></script>


    <script>

        let firstTime = localStorage.getItem("confetti_loaded");

        //TODO: If Backend is developed, make a
        document.addEventListener('DOMContentLoaded', function () {
            var stepper = new Stepper(document.querySelector('.bs-stepper'))
            if (firstTime != 'yes') {
                // first time loaded!
                localStorage.setItem("confetti_loaded", "yes");
                confetti.start()
                setTimeout(function(){confetti.stop();},3000)
            }
        })


    </script>
@endsection



