<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'name' => 'privacyPolicy',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'termAndCondition',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'phoneNumber',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'facebook',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'youtube',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siteSlogan',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siteDescription',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siteName',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'email',
                'payload' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'logo',
                'payload' => 'upload/hCroUAekyY90Fj3WaoVsJpyuFAoHaz6RNS8NZRUf.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('settings')->insert($settings);
    }
}
