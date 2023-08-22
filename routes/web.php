<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Lang\LanguageController;
use App\Livewire\Admin\Blog\BlogList;
use App\Livewire\Admin\Home\DashBoard;
use App\Livewire\Admin\User\ChangePassword;
use App\Livewire\Admin\User\EditProfile;
use App\Livewire\Admin\User\UserList;
use App\Livewire\User\Home\HomePage;
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
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', DashBoard::class)->name('dashboard');
    Route::get('/blog', BlogList::class)->name('blog.index');
    Route::get('/edit-profile/{id}', EditProfile::class)->name('user-edit.profile');
    Route::get('/user', UserList::class)->name('user.index');
    Route::get('/user-change-password', ChangePassword::class)->name('user-change-password.index');
});

Route::get('/', HomePage::class)->name('home');
