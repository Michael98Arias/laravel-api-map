<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitSeeder extends Seeder
{
    public function run()
    {
        DB::table('visits')->insert([
            [
                'id' => 1,
                'name' => 'Visit One Andres',
                'email' => 'Andres@tempo.com',
                'latitude' => '51.517609',
                'longitude' => '-0.087376',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Visit Two Camilo',
                'email' => 'Camilo@tempo.com',
                'latitude' => '51.494637',
                'longitude' => '-0.099392',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
