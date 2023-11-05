<?php

namespace App\Support;

use PragmaRX\Google2FALaravel\Exceptions\InvalidSecretKey;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class Google2FAAuthenticator extends Authenticator
{
    protected function canPassWithoutCheckingOTP()
    {
        if(! $this->getUser()->twoFactorAuthentication->count()) {
            return true;
        }

        return
            ! $this->getUser()->twoFactorAuthentication->google2fa_enable ||
            ! $this->isEnabled() ||
            $this->noUserIsAuthenticated() ||
            $this->twoFactorAuthStillValid();
    }

    protected function getGoogle2FASecretKey()
    {
        $secret = $this->getUser()->twoFactorAuthentication->{$this->config('otp_secret_column')};

        if (empty($secret)) {
            throw new InvalidSecretKey('Secret key cannot be empty.');
        }

        return $secret;
    }

}
