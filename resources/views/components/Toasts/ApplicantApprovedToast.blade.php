<!-- Toast Notification -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
    <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Application
                of
                {{  $applicant->first_name . ' ' . $applicant->middle_name[0] . '. ' . $applicant->surname . ', ' . $applicant->name_extension }}
                approved successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
