<?php

use Illuminate\Support\Facades\Route;
/**

//use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\PostJobController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\isEmployer;
use Illuminate\Foundation\Auth\PhoneVerificationRequest;**/

use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployeeFavoriteController;
use App\Http\Controllers\EmployeeRatingController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\JobApplicantController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\CommentController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::middleware([CheckAuth::class])->group(function () {
    Route::get('/register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker');
    Route::post('/register/seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');
    Route::get('/register/employer', [UserController::class, 'createEmployer'])->name('create.employer');
    Route::post('/register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');
});


// Routes for Employers
Route::get('/employers', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/employers/{id}', [EmployerController::class, 'show'])->name('employers.show');
Route::get('/employers/create', [EmployerController::class, 'create'])->name('employers.create');
Route::post('/employers', [EmployerController::class, 'store'])->name('employers.store');
Route::get('/employers/{id}/edit', [EmployerController::class, 'edit'])->name('employers.edit');
Route::put('/employers/{id}', [EmployerController::class, 'update'])->name('employers.update');
Route::delete('/employers/{id}', [EmployerController::class, 'destroy'])->name('employers.destroy');

// Routes for listing and viewing employees
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/{id}', [EmployeeController::class, 'show']);

// Routes for creating and storing new employees
Route::get('/employees/create', [EmployeeController::class, 'create']);
Route::post('/employees', [EmployeeController::class, 'store']);

// Routes for editing and updating employees
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);

// Route for deleting employees
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);


Route::resource('employee-favorites', EmployeeFavoriteController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);

Route::resource('employee-ratings', EmployeeRatingController::class);

Route::resource('employee-profiles', EmployeeProfileController::class);
Route::get('/login', [UserController::class, 'login'])->name('login');
//->middleware(CheckAuth::class);
Route::post('/login', [UserController::class, 'postLogin'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::post('user/profile', [UserController::class, 'update'])->name('user.update.profile')->middleware('auth');
Route::get('user/profile/seeker', [UserController::class, 'seekerProfile'])->name('seeker.profile')
->middleware(['auth','verified']);

Route::get('user/JobApplicant/id', [UserController::class, 'JobApplicant'])->name('JobApplicant.applied')
->middleware(['auth','verified']);

Route::post('user/password', [UserController::class, 'changePassword'])->name('user.password')->middleware('auth');
Route::post('upload/resume', [UserController::class, 'uploadResume'])->name('upload.resume')->middleware('auth');


Route::get('register/resend-verification', [DashboardController::class,'resendVerification'])
->name('register.resend-verification');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['verified'])
    ->name('dashboard');
Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');
Route::get('/resend/verification/phonenumber',[DashboardController::class, 'resend'])->name('resend.phonenumber');

Route::resource('job-posts', JobPostController::class);
Route::get('job-posts/create', [JobPostController::class, 'create'])->name('job-posts.create');
Route::post('job-posts/store', [JobPostController::class, 'store'])->name('job-posts.store');
Route::get('job-posts/{id}/edit', [JobPostController::class, 'edit'])->name('job-posts.edit');
Route::put('job-posts/{id}/edit', [JobPostController::class, 'update'])->name('job-posts.update');
Route::get('job-posts', [JobPostController::class, 'index'])->name('job-posts.index');
Route::delete('job-posts/{id}/delete', [JobPostController::class, 'destroy'])->name('job-posts.delete');

Route::resource('job-applicants', JobApplicantController::class);
Route::get('job-applicants' ,[ApplicantController::class, 'index'])->name('job-applicants.index');
Route::get('job-applicants/{id:slug}' ,[ApplicantController::class, 'show'])->name('job-applicants.show');
Route::post('/job-applicants/{id}/submit', [ApplicantController::class,'apply'])->name('job-applicants.submit');
Route::resource('comments', CommentController::class);
Route::get('/phonenumber/verify/{id}/{hash}', function (PhoneVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');




