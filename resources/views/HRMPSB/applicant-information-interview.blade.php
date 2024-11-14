
<div>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <div class="text-center mb-3">
                    <img src="http://127.0.1:8000/assets/images/users/avatar-4.jpg" alt="Avatar of Applicant" class="rounded-circle img-fluid" style="max-width: 150px;">
                </div>
                @if($applicant)
                    <h2>{{ $applicant->first_name  . ' ' . $applicant->middle_name  . ' ' .  $applicant->surname }}</h2>
                    <p>Applicant code: <i>{{ $applicant->applicant_code }}</i></p>
                @else
                    <p>Applicant information not found.</p>

                @endif

                <button class="btn btn-primary mb-4">Submit for Final Review</button>

            </div>

           @if($interview_type === 'classroom-observation')
                <!-- Classroom Observation Content -->
                <div class="tab-pane fade show active" id="classroom" role="tabpanel">
                    <h4> Classroom Observation / Demo Teaching</h4>
                    <p><span>involves evaluators assessing a teacher's instructional methods, classroom management, and student engagement during an actual lesson. This process aims to enhance teaching practices and ensure quality education.</span></p>


                    <!-- Sub-tabs for Classroom Observation -->
                    <ul class="nav nav-tabs mb-3" id="classroomSubTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="io-af-tab" data-bs-toggle="tab" data-bs-target="#cot-rsp" type="button" role="tab">Inter-Observer Agreement Form</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="notes-form-tab" data-bs-toggle="tab" data-bs-target="#notes-form" type="button" role="tab">Observation Notes Form</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rating-sheet-tab" data-bs-toggle="tab" data-bs-target="#rating-sheet" type="button" role="tab">Rating Sheet</button>
                        </li>
                    </ul>



                    <!-- Sub-tab Content for Classroom Observation -->
                    <div class="tab-content" id="classroomSubTabsContent">

                        <!-- inter-observer-agreement-form Content for Classroom Observation -->
                        <div class="tab-pane fade show active" id="cot-rsp" role="tabpanel">
                            @livewire('selection-board.inter-observer-agreement-form')
                        </div>


                        <div class="tab-pane fade" id="notes-form" role="tabpanel">
                            @livewire('selection-board.observer-form-notes')
                        </div>

                        <div class="tab-pane fade" id="rating-sheet" role="tabpanel">
                            @livewire('selection-board.rating-sheet')
                        </div>
                    </div>
                </div>

           @elseif($interview_type === 'non-classroom-observation')
                <!-- Non-Classroom Observation Content -->
                <div class="tab-pane show active" id="nonclassroom" role="tabpanel">
                    <h4> Non-Classroom Observation </h4>
                    <p>
                        <span>refers to the evaluation of a teacher's performance in areas outside direct classroom instruction, </span>
                        <span>such as lesson planning, professional development, and community involvement. These assessments provide a comprehensive</span>
                        <span>view of a teacher's overall effectiveness.</span>
                    </p>
                    <!-- Similar structure for sub-tabs under Non-Classroom Observation -->
                    <ul class="nav nav-tabs mb-3" id="nonClassroomSubTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="io-af-tab-non" data-bs-toggle="tab" data-bs-target="#trf-non" type="button" role="tab">Teacher Reflection Form</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="notes-form-tab-non" data-bs-toggle="tab" data-bs-target="#iea-form-non" type="button" role="tab">Inter-Evaluator Agreement Form</button>
                        </li>
                    </ul>

                    <!-- Sub-tab Content for Non-Classroom Observation -->
                    <div class="tab-content" id="nonClassroomSubTabsContent">
                        <div class="tab-pane fade show active" id="trf-non" role="tabpanel">
                              @livewire('selection-board.teacher-reflection-form')
                        </div>
                        <div class="tab-pane fade" id="iea-form-non" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">INDICATORS</th>
                                        <th class="text-center">FINAL RATING</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1. Maintain learning environments that are responsive to community contexts.</td>
                                        <td class="text-center align-middle">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <span class="input-group-btn input-group-prepend">
                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                </span>
                                                <input type="text" data-toggle="touchspin" value="5" data-step="1" data-decimals="2" data-bts-postfix="%" class="form-control">
                                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. Review regularly personal teaching practice using existing laws and regulations that applyto the teaching profession and the responsibilities specified in the Code of Ethics forProfessional Teachers.</td>
                                        <td class="text-center align-middle">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <span class="input-group-btn input-group-prepend">
                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                </span>
                                                <input type="text" data-toggle="touchspin" value="5" data-step="1" data-decimals="2" data-bts-postfix="%" class="form-control">
                                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3. Adopt practices that uphold the dignity of teaching as a profession by exhibiting qualitiessuch as caring attitude, respect, and integrity.</td>
                                        <td class="text-center align-middle">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <span class="input-group-btn input-group-prepend">
                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                </span>
                                                <input type="text" data-toggle="touchspin" value="5" data-step="1" data-decimals="2" data-bts-postfix="%" class="form-control">
                                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4. Participated in professional networks to share knowledge and to enhance practice.</td>
                                        <td class="text-center align-middle">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <span class="input-group-btn input-group-prepend">
                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                </span>
                                                <input type="text" data-toggle="touchspin" value="5" data-step="1" data-decimals="2" data-bts-postfix="%" class="form-control">
                                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>TOTAL NO. OF POINTS OBTAINED (highest possible score is 20)</strong></td>
                                        <td class="text-center align-middle">
                                            <strong>15 / 20</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="mt-3">
                                                <h6><strong>OTHER COMMENTS:</strong></h6>
                                                <div id="classic-editor4"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Final rating for NCOI TRF i.e., (total no. of points obtained / highest possible score) x 25</strong></td>
                                        <td class="text-center align-middle">
                                            <strong>15 Points</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
           @endif


            </div>

        </div>
</div>
