<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ResumeController extends Controller
{
    public mixed $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $id = $request->route('id');
            $this->user = $user = User::with([
                'avatar',
                'profile',
                'addresses.province',
                'addresses.district',
                'educations',
                'skills',
                'certificates',
                'experiences',
                'awards',
                'projects',
                'products',
                'socialActivities',
                'courses'
            ])->findOrFail($id);

            if ($user->profile && $user->profile->payload['allowPublishing'] == 'publish'
                || $user->id == Auth::id()) {
                return $next($request);
            }

            toast(trans('This page seems to be unavailable or the user does not want to share resources'), 'warning');
            abort(404);
        });
    }

    public function __invoke(string|int  $id): View
    {
        return view('pdf.resume', [
            'user' => $this->user,
        ]);
    }
}
