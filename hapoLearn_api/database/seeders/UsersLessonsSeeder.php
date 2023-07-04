<?php

namespace Database\Seeders;

use App\Models\UserLesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLesson::factory()->count(900)->create();
    }
}
