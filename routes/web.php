<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Lang\LanguageController;
use App\Http\Controllers\User\ResumeController;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Home\DashBoard;
use App\Livewire\Admin\Job\JobCreate;
use App\Livewire\Admin\Job\JobDelete;
use App\Livewire\Admin\Job\JobEdit;
use App\Livewire\Admin\Job\JobList;
use App\Livewire\Admin\RolePermission\RoleSetting;
use App\Livewire\Admin\TrendingWord\TrendingWordList;
use App\Livewire\Admin\User\ChangePassword;
use App\Livewire\Admin\User\UserList;
use App\Livewire\Admin\User\UserProfile as AdminUserProfile;
use App\Livewire\User\Home\HomePage;
use App\Livewire\User\Job\Detail\JobDetail;
use App\Livewire\User\Job\JobList as UserJobList;
use App\Livewire\User\User\Company\CompanyProfile;
use App\Livewire\User\User\Company\Job\JobCreate as CompanyJobCreate;
use App\Livewire\User\User\Company\Job\JobEdit as CompanyJobEdit;
use App\Livewire\User\User\Company\Job\JobList as CompanyJobList;
use App\Livewire\User\User\Student\StudentProfile;
use App\Livewire\User\User\Student\StudentResume;
use App\Livewire\User\User\Student\StudentWishlistJob;
use App\Livewire\User\User\UserChangePassword;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Authentication Routes */
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login'])->middleware('recaptcha');
Route::post('logout', [LoginController::class,'logout'])->name('logout');

/* Registration Routes */
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->middleware('recaptcha');

/* Password Reset Routes */
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('recaptcha');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

/* Confirm Password */
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

/* Email Verification Routes */
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

/* Lang */
Route::get('lang/{locale}', [LanguageController::class, '__invoke'])->name('language.__invoke');

/* Admin */
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('/', DashBoard::class)->name('dashboard')->middleware('permission:dashboard');
    Route::get('/role-permission', RoleSetting::class)->name('role-permission')->middleware('permission:role-permission');
    Route::get('/user-profile/{id}', AdminUserProfile::class)->name('user-edit.profile')->middleware('permission:user-edit');
    Route::get('/user', UserList::class)->name('user.index')->middleware('permission:user-list');
    Route::get('/user-change-password', ChangePassword::class)->name('user-change-password.index');
    Route::get('/job', JobList::class)->name('job.index')->middleware('permission:job-list');
    Route::get('/job-edit/{id}', JobEdit::class)->name('job.edit')->middleware('permission:job-edit');
    Route::get('/job-create', JobCreate::class)->name('job.create')->middleware('permission:job-create');
    Route::get('/job-delete', JobDelete::class)->name('job.delete')->middleware('permission:job-delete');
    Route::get('/category', CategoryList::class)->name('category.index')->middleware('permission:category-list');
    Route::get('/trending-word', TrendingWordList::class)->name('trending-word.index')->middleware('permission:trending-word-list');
});

Route::get('/', HomePage::class)->name('home');
Route::get('/job-detail/{id}', JobDetail::class)->name('job-detail');
Route::get('/job-list', UserJobList::class)->name('job-list.user');
Route::get('/user-resume-preview/{id}', [ResumeController::class, '__invoke'])->name('user-resume-preview.user');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/user-change-password', UserChangePassword::class)->name('user-change-password.user');

    Route::get('/student-profile', StudentProfile::class)->name('student-profile.user')->middleware('permission:student-profile-create');
    Route::get('/student-wishlist-job', StudentWishlistJob::class)->name('student-wishlist.user')->middleware('permission:student-job-wishlist');
    Route::get('/student-resume', StudentResume::class)->name('student-resume.user')->middleware('permission:student-resume-create');

    Route::get('/company-profile', CompanyProfile::class)->name('company-profile.user')->middleware('permission:company-profile-create');
    Route::get('/company-job-create', CompanyJobCreate::class)->name('company-job-create.user')->middleware('permission:company-job-create');
    Route::get('/company-job-list', CompanyJobList::class)->name('company-job-list.user')->middleware('permission:company-job-list');
    Route::get('/company-job-edit/{id}', CompanyJobEdit::class)->name('company-job-edit.user')->middleware('permission:company-job-edit');
});
