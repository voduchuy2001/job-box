<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'Vo Duc Huy',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => UserRole::Admin->value,
            'status' => UserStatus::IsActive->value,
            'is_root' => 1,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
