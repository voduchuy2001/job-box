<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ResumeController extends Controller
{
    public function __invoke(string|int  $id): View
    {
        if ($id != Auth::id()) {
            abort(403);
        }

        $user = User::with([
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

        return view('pdf.resume', [
            'user' => $user,
        ]);
    }
}
