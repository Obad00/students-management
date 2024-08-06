<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ue;
class UESeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ue::factory()->count(10)->create();
    }
}
