<div>
    <div class="text-center">
        <div class="text-center mb-3">
            <img src="http://127.0.0.1:8000/assets/images/users/avatar-4.jpg" alt="Avatar of Applicant" class="rounded-circle img-fluid" style="max-width: 150px;">
        </div>
        @if($applicant)
            <div class="card mb-4">
                <div class="card-body">
                    <h3>{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</h3>
                    <p><strong>Applicant Code:</strong> {{ $applicant_code }}</p>
                    <p><strong>Position Title:</strong> {{ $applicant->position_title }}</p>
                    <p><strong>Education:</strong> {{ $applicant->education }}</p>
                    <p><strong>Place of Birth:</strong> {{ $applicant->place_of_birth }}</p>
                    <p><strong>Residential Address:</strong> {{ $applicant->residential_address }}</p>
                    <p><strong>Permanent Address:</strong> {{ $applicant->permanent_address }}</p>
                    <p><strong>Contact Information:</strong> {{ $applicant->contact_number }}</p>
                    <!-- Add more fields as needed -->
                </div>
            </div>
        @else
            <p>Applicant information not found.</p>
        @endif
        <button class="btn btn-primary mb-4">Submit for Final Review</button>
    </div>

    <!-- Centered Primary Tabs for Classroom/Non-Classroom Observations -->
    <div class="d-flex justify-content-center mb-3">
        <ul class="nav nav-tabs" id="mainTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="classroom-tab" data-bs-toggle="tab" data-bs-target="#classroom" type="button" role="tab">CO/DT</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nonclassroom-tab" data-bs-toggle="tab" data-bs-target="#nonclassroom" type="button" role="tab">NCOI</button>
            </li>
        </ul>
    </div>


    <!-- Tab Content for Primary Tabs -->
    <div class="tab-content" id="mainTabsContent">
        <!-- Classroom Observation Content -->
        <div class="tab-pane fade show active" id="classroom" role="tabpanel">
            <h4> Classroom Observation / Demo Teaching</h4>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti error illo laborum magnam nemo praesentium ut voluptatum. Ab, consequuntur cumque eveniet fugiat, natus perspiciatis provident quo quos, sapiente veniam voluptas.</span><span>Atque iusto, veniam. Accusantium aut dicta dolore enim illo illum nesciunt nihil odit repellendus soluta, tempora temporibus voluptates voluptatum? Animi at eius eligendi mollitia necessitatibus neque nesciunt officiis quos ullam?</span></p>
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
                <div class="tab-pane fade show active" id="cot-rsp" role="tabpanel">
                    <p> Contents here of COT-RSP Rubric </p>
                </div>
                <div class="tab-pane fade" id="notes-form" role="tabpanel">
                    <p> Contents here of Observation Notes Form </p>
                </div>
                <div class="tab-pane fade" id="rating-sheet" role="tabpanel">
                    <p> Contents here of Rating Sheet </p>
                </div>
            </div>
        </div>

        <!-- Non-Classroom Observation Content -->
        <div class="tab-pane fade" id="nonclassroom" role="tabpanel">
            <h4> Non-Classroom Observation </h4>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad adipisci aliquam at beatae eaque exercitationem fugit, itaque molestiae nihil numquam obcaecati, odit perferendis perspiciatis, quia ratione sit suscipit tempora.</span><span>A aliquam atque autem commodi enim, ipsa iste porro? Accusantium aliquam, animi consequuntur cum, debitis dolore dolores fugiat, illo incidunt minus qui quibusdam quidem sapiente? Asperiores explicabo facilis labore sint?</span></p>
            <!-- Similar structure for sub-tabs under Non-Classroom Observation -->
            <ul class="nav nav-tabs mb-3" id="nonClassroomSubTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="io-af-tab-non" data-bs-toggle="tab" data-bs-target="#cot-rsp-non" type="button" role="tab">Inter-Observer Agreement Form</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="notes-form-tab-non" data-bs-toggle="tab" data-bs-target="#notes-form-non" type="button" role="tab">Observation Notes Form</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rating-sheet-tab-non" data-bs-toggle="tab" data-bs-target="#rating-sheet-non" type="button" role="tab">Rating Sheet</button>
                </li>
            </ul>

            <!-- Sub-tab Content for Non-Classroom Observation -->
            <div class="tab-content" id="nonClassroomSubTabsContent">
                <div class="tab-pane fade show active" id="cot-rsp-non" role="tabpanel">
                    <p> Contents here of COT-RSP Rubric for Non-Classroom Observation </p>
                </div>
                <div class="tab-pane fade" id="notes-form-non" role="tabpanel">
                    <p> Contents here of Observation Notes Form for Non-Classroom Observation </p>
                </div>
                <div class="tab-pane fade" id="rating-sheet-non" role="tabpanel">
                    <p> Contents here of Rating Sheet for Non-Classroom Observation </p>
                </div>
            </div>
        </div>
    </div>
</div>
