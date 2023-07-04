<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::factory()->count(4000)->create();
    }
}
