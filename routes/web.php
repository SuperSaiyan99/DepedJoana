<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::get('/', function () {
    return view('guest.welcome');
})->name('index');



require __DIR__ . '/auth.php';



#roles and permissions
Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
#Social Providers
Route::get('/auth/{provider}/redirect', [\App\Http\Controllers\Provider\ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [\App\Http\Controllers\Provider\ProviderController::class, 'callback']);







#routes for applicants
Route::group(['middleware' => ['auth', 'applicant'], 'prefix' => 'applicant'], function () {

    Route::get('home', [App\Http\Controllers\Auth\ApplicantController::class, 'redirectToApplicantHome'])->name('applicants.home');

    Route::view('/work-experience', 'applicants.work-experience-sheet')->name('applicants.work-experience-sheet');
    Route::view('/status', 'applicants.applicant-status')->name('applicants.applicant-status');
    Route::view('/document-upload', 'applicants.upload-documents')->name('applicants.applicant-upload');
    Route::view('/pds', 'applicants.personal-data-sheet')->name('applicants.personal-data-sheet');
    Route::view('/profile', 'applicants.profile')->name('applicants.profile');

});












    #routes for HRMPSB (FORMERLY hiring-board)
    Route::group(['middleware' => ['auth', 'hrmpsb'], 'prefix' => 'selection-board'], function () {


            Route::get('/home', [App\Http\Controllers\Auth\HRMPSBController::class, 'redirectToHRMPSBHome'])->name('selection-board.home');


            Route::view('manage-vacancies', 'HRMPSB.manage-vacancies')->name('selection-board.vacancies');
            Route::view('manage-application', 'HRMPSB.manage-application')->name('selection-board.manage-application');
            Route::view('candidate-assessment', 'HRMPSB.review-application')->name('selection-board.candidate-assessment');
            Route::view('review-rank-status', 'HRMPSB.review-rank-status')->name('selection-board.review-rank-status');
            Route::view('initial-evaluation-report', 'HRMPSB.initial-evaluation')->name('selection-board.initial-evaluation');
            Route::view('applicant-tracking-report', 'HRMPSB.applicant-tracking')->name('selection-board.applicant-tracking');
            Route::view('comparative-assessment-report', 'HRMPSB.comparative-assessment')->name('selection-board.comparative-assessment');


Route::get('/{interview_type}/applicant-information/{vacancy_code}/{applicant_code}', function ($interview_type, $vacancy_code, $applicant_code) {
        $applicant = \App\Services\Queries\QueryService::fetch_applicant_information_by_vacancy_and_applicantCode($vacancy_code, $applicant_code);


            if (!$applicant || ($interview_type != 'classroom-observation' && $interview_type != 'non-classroom-observation'))
            {
                abort(404, 'Applicant information not found');
            }


            // Pass the applicant information to the view
            return view('HRMPSB.review-application', [
                'applicant' => $applicant,
                'interview_type' => $interview_type
            ]);


        })->name('selection-board.applicant-information');



        Route::get('/image/{filename}', function ($filename) {

            $path = storage_path('app/public/pdf-images/' . $filename);

            // Check if the file exists
            if (!Storage::exists('public/pdf-images/' . $filename) || !file_exists($path)) {
                abort(404);
            }

            // Get file content and MIME type
            $file = file_get_contents($path);
            $type = mime_content_type($path);

            return Response::make($file, 200)->header('Content-Type', $type);
        })->name('selection-board.image');

});











#routes for HRMO
Route::group(['middleware' => ['auth', 'hrmo'], 'prefix' => 'management-officer'], function () {

    #Middleware Redirect Controller
    Route::get('/home', [App\Http\Controllers\Auth\HRMOController::class, 'redirectToHRMOHome'])->name('management-officer.home');

    Route::view('manage-vacancies', 'HRMO.manage-vacancies')->name('management-officer.vacancies');
    Route::view('manage-application', 'HRMO.manage-application')->name('management-officer.manage-application');
    Route::view('review-application', 'HRMO.review-application')->name('management-officer.review-application');
    Route::view('review-rank-status', 'HRMO.review-rank-status')->name('management-officer.review-rank-status');
    Route::view('vacancy-logs', 'HRMO.vacancy-logs')->name('management-officer.vacancy-logs');
    Route::view('candidate-logs', 'HRMO.vacancy-logs')->name('management-officer.candidate-logs');
    Route::view('initial-evaluation-results', 'HRMO.initial-evaluation-results')->name('management-officer.initial-evaluation');
    Route::view('applicant-tracking-report', 'HRMO.applicant-tracking')->name('management-officer.applicant-tracking');
    Route::view('comparative-assessment-report', 'HRMO.comparative-assessment')->name('management-officer.comparative-assessment');


    Route::get('/image/{filename}', function ($filename) {

        $path = storage_path('app/public/pdf-images/' . $filename);

        // Check if the file exists
        if (!Storage::exists('public/pdf-images/' . $filename) || !file_exists($path)) {
            abort(404);
        }

        // Get file content and MIME type
        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return Response::make($file, 200)->header('Content-Type', $type);
    })->name('management-officer.image');
});










#routes for APPOINTING Officer
Route::group(['middleware' => ['auth', 'appointing_officer'], 'prefix' => 'appointing-officer'], function () {

    Route::get('/home', [App\Http\Controllers\Auth\AppointingOfficerController::class, 'redirectToAppointingOfficerHome'])->name('appointing-officer.home');

    Route::view('/vacancies', 'AppointingOfficer.vacancies')->name('appointing-officer.vacancies');
    Route::view('/recommended-candidates', 'AppointingOfficer.candidates')->name('appointing-officer.candidates');

});









#Routes for Supperadmin
Route::group(['middleware' => ['auth', 'superadmin'], 'prefix' => 'super-admin'], function () {

    #Middleware Redirect Controller
    Route::get('/home', [App\Http\Controllers\Auth\SuperAdminController::class, 'redirectToSuperAdminHome'])->name('super-admin.home');





    # Laravel Pulse Route
    Route::get('/pulse', function () {
        return redirect()->to(config('pulse.path'));
    })->name('super-admin.pulse');

});

