<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->updateOrInsert(
            ['id' => 1],
            [
                'address' => 'آدرس فروشگاه',
                'telephone' => '02112345678',
                'telephone2' => '09123456789',
                'longitude' => '51.4837741397527',
                'latitude' => '35.61738972885706',
                'instagram' => 'https://instagram.com/mohamad.moradix',
                'telegram' => 'https://t.me/moradi_x',
                'facebook' => 'https://facebook.com/moradi_x',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
