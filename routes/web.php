<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.welcome');
});

require __DIR__.'/auth.php';

#roles and permissions
Route::resource('permissions', \App\Http\Controllers\PermissionController::class);


#testview-applicants
Route::view('/applicant-home', 'applicants.home')->name('applicants.home');
Route::view('/applicant-work-experience', 'applicants.work-experience-sheet')->name('applicants.work-experience-sheet');
Route::view('/applicant-status', 'applicants.applicant-status')->name('applicants.applicant-status');
Route::view('/applicant-upload', 'applicants.upload-documents')->name('applicants.applicant-upload');
Route::view('/applicant-pds', 'applicants.personal-data-sheet')->name('applicants.personal-data-sheet');


//#testview-hiring-board
//Route::view('/hiring-board-testing', 'HiringBoard.home');
//Route::view('/Superadmin-testing', 'SuperAdmin.home');
//Route::view('/admin-testing', 'admin.home');
//
//#testview-superadmin
//Route::view('/hiring-board-testing', 'HiringBoard.home');
//Route::view('/Superadmin-testing', 'SuperAdmin.home');
//Route::view('/admin-testing', 'admin.home');
//
//#testview-superadmin
//Route::view('/hiring-board-testing', 'HiringBoard.home');
//Route::view('/Superadmin-testing', 'SuperAdmin.home');
//Route::view('/admin-testing', 'admin.home');


#Social Providers
Route::get('/auth/{provider}/redirect', [\App\Http\Controllers\Provider\ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [\App\Http\Controllers\Provider\ProviderController::class, 'callback']);



#routes for applicants
Route::group(['middleware' => ['auth', 'applicant'], 'prefix' => 'applicant'], function () {
    Route::get('applicant/home', [App\Http\Controllers\Auth\ApplicantController::class, 'redirectToApplicantHome'])->name('applicant.home');


});


#routes for hiring-board
Route::group(['middleware' => ['auth', 'hiring_board'], 'prefix' => 'hiring-board'], function () {
       Route::get('/home', [App\Http\Controllers\Auth\HiringBoardController::class, 'redirectToHiringBoardHome'])->name('hiring-board.home');


});

#routes for admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    #Middleware Redirect Controller
    Route::get('home', [App\Http\Controllers\Auth\AdminController::class, 'redirectToAdminHome'])->name('home');

    # Resources
    Route::resources([
        'manage-users' => \App\Http\Controllers\UserManagement\ManageUserController::class,
        'manage-application' => \App\Http\Controllers\ApplicationManagement\ManageApplicationController::class,
        'review-application' => \App\Http\Controllers\ApplicationManagement\ReviewApplicationController::class,
        'review-rank-status' => \App\Http\Controllers\ApplicationManagement\RevieRankStatusController::class,
    ]);

});


#Routes for Supperadmin
Route::group(['middleware' => ['auth', 'superadmin'], 'prefix' => 'super-admin', 'as' => 'super-admin.'], function () {

    #Middleware Redirect Controller
    Route::get('home', [App\Http\Controllers\Auth\SuperAdminController::class, 'redirectToSuperAdminHome'])->name('home');

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

