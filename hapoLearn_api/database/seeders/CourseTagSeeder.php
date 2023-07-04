<?php

namespace Database\Seeders;

use App\Models\CourseTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseTag::factory()->count(800)->create();
    }
}
