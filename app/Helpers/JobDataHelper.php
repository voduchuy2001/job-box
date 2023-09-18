<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class JobDataHelper
{
    public static function updateOrCreateJobData(mixed $validatedData): array
    {
        return [
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'category_id' => $validatedData['category'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
            'vacancy' => $validatedData['vacancy'],
            'experience' => $validatedData['experience'],
            'deadline_for_filing' => $validatedData['deadlineForFiling'],
            'status' => $validatedData['status'],
            'user_id' => Auth::id(),
            'min_salary' => $validatedData['min'],
            'max_salary' => $validatedData['max'],
        ];
    }
}