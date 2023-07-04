<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(UsersCoursesSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(LessonsSeeder::class);
        $this->call(CourseTagSeeder::class);
        $this->call(DocumentsSeeder::class);
        $this->call(UsersLessonsSeeder::class);
    }
}
