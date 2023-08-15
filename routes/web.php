<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GithubLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Lang\LanguageController;
use App\Http\Controllers\User\HomeController;
use App\Livewire\Admin\Home\DashBoard;
use App\Livewire\Admin\User\UserList;
use App\Livewire\Admin\User\UserProfile;
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

Route::get('auth/github', [GithubLoginController::class, 'redirect'])->name('github.redirect');
Route::get('auth/github/callback', [GithubLoginController::class, 'callback'])->name('github.callback');

/* Lang */
Route::get('lang/{locale}', [LanguageController::class, '__invoke'])->name('language.__invoke');

/* User */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* Admin */
Route::group(['prefix' => '/', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', DashBoard::class)->name('dashboard');
    Route::get('/profile/{id}', UserProfile::class)->name('user.profile');
    Route::get('/user', UserList::class)->name('user.index');
});
