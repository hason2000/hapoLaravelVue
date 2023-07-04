<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::factory()->count(400)->create();
    }
}
