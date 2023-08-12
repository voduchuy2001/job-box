<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use Symfony\Component\HttpFoundation\Response;

class VerifyRecaptchaV3
{
    public function handle(Request $request, Closure $next): Response
    {
        $formName = $request->input('g_form_name');

        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'), $formName);

        if ($score < 0.5) {
            toast('Recaptcha validation failed', 'warning');
            return redirect()->back();
        }

        return $next($request);
    }
}
