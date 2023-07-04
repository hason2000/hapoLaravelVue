<?php

use App\Models\User as User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hapo Tester',
            'email' => 'test@haposoft.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory()->count(10)->create();
    }
}
