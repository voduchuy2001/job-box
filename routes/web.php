<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Lang\LanguageController;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Home\DashBoard;
use App\Livewire\Admin\Job\JobCreate;
use App\Livewire\Admin\Job\JobEdit;
use App\Livewire\Admin\Job\JobList;
use App\Livewire\Admin\RolePermission\RoleSetting;
use App\Livewire\Admin\User\ChangePassword;
use App\Livewire\Admin\User\ProfileEdit;
use App\Livewire\Admin\User\UserList;
use App\Livewire\User\Home\HomePage;
use App\Livewire\User\Job\Detail\JobDetail;
use App\Livewire\User\Job\JobList as UserJobList;
use App\Livewire\User\User\UserProfile;
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
Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/', DashBoard::class)->name('dashboard')->middleware('permission:dashboard');
    Route::get('/role-permission', RoleSetting::class)->name('role-permission')->middleware('permission:role-permission');
    Route::get('/edit-profile/{id}', ProfileEdit::class)->name('user-edit.profile')->middleware('permission:user-edit');
    Route::get('/user', UserList::class)->name('user.index')->middleware('permission:user-list');
    Route::get('/user-change-password', ChangePassword::class)->name('user-change-password.index');
    Route::get('/job', JobList::class)->name('job.index')->middleware('permission:job-list');
    Route::get('/job-edit/{id}', JobEdit::class)->name('job.edit')->middleware('permission:job-list');
    Route::get('/job-create', JobCreate::class)->name('job.create')->middleware('permission:job-create');
    Route::get('/category', CategoryList::class)->name('category.index')->middleware('permission:category-list');
});

Route::get('/', HomePage::class)->name('home');
Route::get('/job-detail/{id}', JobDetail::class)->name('job-detail');
Route::get('/job-list', UserJobList::class)->name('user.job-list');
Route::get('/user-profile', UserProfile::class)->name('user-profile.user')->middleware('auth');
