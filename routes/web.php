<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('applicant/home', [App\Http\Controllers\Auth\ApplicantController::class, 'redirectToApplicantHome'])->name('home');

    Route::view('/home', 'applicants.home')->name('applicants.home');
    Route::view('/work-experience', 'applicants.work-experience-sheet')->name('applicants.work-experience-sheet');
    Route::view('/status', 'applicants.applicant-status')->name('applicants.applicant-status');
    Route::view('/upload', 'applicants.upload-documents')->name('applicants.applicant-upload');
    Route::view('/pds', 'applicants.personal-data-sheet')->name('applicants.personal-data-sheet');
    Route::view('/profile', 'applicants.profile')->name('applicants.profile');

});


#routes for HRMPSB (FORMERLY hiring-board)
Route::group(['middleware' => ['auth', 'hrmpsb'], 'prefix' => 'selection-board'], function () {

    Route::get('/home', [App\Http\Controllers\Auth\HRMPSBController::class, 'redirectToHRMPSBHome'])->name('home');

});

#routes for HRMO (FORMMERLY ADMIN)
Route::group(['middleware' => ['auth', 'hrmo'], 'prefix' => 'management-officer'], function () {

    #Middleware Redirect Controller
    Route::get('/home', [App\Http\Controllers\Auth\HRMOController::class, 'redirectToHRMOHome'])->name('home');

    # Resources
    Route::resources([
        'manage-users' => \App\Http\Controllers\UserManagement\ManageUserController::class,
        'manage-application' => \App\Http\Controllers\ApplicationManagement\ManageApplicationController::class,
        'review-application' => \App\Http\Controllers\ApplicationManagement\ReviewApplicationController::class,
        'review-rank-status' => \App\Http\Controllers\ApplicationManagement\RevieRankStatusController::class,
    ]);

});

#routes for APPOINTING Officer
Route::group(['middleware' => ['auth', 'appointing_officer'], 'prefix' => 'appointing-officer'], function () {

    Route::get('/home', [App\Http\Controllers\Auth\AppointingOfficerController::class, 'redirectToAppointingOfficerHome'])->name('home');

});


#Routes for Supperadmin
Route::group(['middleware' => ['auth', 'superadmin'], 'prefix' => 'super-admin'], function () {

    #Middleware Redirect Controller
    Route::get('/home', [App\Http\Controllers\Auth\SuperAdminController::class, 'redirectToSuperAdminHome'])->name('home');

    # Resources
    Route::resources([
        #UserManagement
        'manage-users' => \App\Http\Controllers\UserManagement\ManageUserController::class,
        #ApplicationManagement
        'manage-application' => \App\Http\Controllers\ApplicationManagement\ManageApplicationController::class,
        'review-application' => \App\Http\Controllers\ApplicationManagement\ReviewApplicationController::class,
        'review-rank-status' => \App\Http\Controllers\ApplicationManagement\RevieRankStatusController::class,
        #RecruitmentManagement
        'manage-vacancies' => App\Http\Controllers\RecruitmentManagement\ManageVacanciesController::class,
        'applicant-tracking' => App\Http\Controllers\RecruitmentManagement\ApplicantTrackingController::class,
    ]);

});

