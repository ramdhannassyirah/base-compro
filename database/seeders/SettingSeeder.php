<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Setting::create([
            'logo' => '/assets/img/dummy-logo.png',
            'name' => 'Ravora Labs',
            'alamat' => 'Jl. Contoh No.123, Jakarta',
            'telepon' => '+62 812 3456 7890',
            'instagram' => '@ravoralabs',
            'linkedin' => 'https://www.linkedin.com/company/ravoralabs',
        ]);
    }
}