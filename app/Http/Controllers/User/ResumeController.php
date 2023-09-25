<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ResumeController extends Controller
{
    public function __invoke(string|int  $id): View
    {
        $user = User::findOrFail($id)
            ->with([
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
        ])->first();

        return view('pdf.resume', [
            'user' => $user,
        ]);
    }
}
