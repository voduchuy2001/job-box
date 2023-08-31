<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider): RedirectResponse|string
    {
        try {
            $socialAccount = Socialite::driver($provider)->user();

            $user = User::updateOrCreate([
                'provider_id' => $socialAccount->getId(),
            ], [
                'email' => $socialAccount->getEmail(),
                'name' => $socialAccount->getName(),
                'provider_id' => $socialAccount->getId(),
                'auth_type' => $provider,
                'status' => UserStatus::IsActive,
                'password' => Hash::make(Str::random(10)),
                'email_verified_at' => Carbon::now(),
            ]);

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
