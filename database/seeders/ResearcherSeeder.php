<?php

namespace Database\Seeders;

use App\Models\Researcher;
use Illuminate\Database\Seeder;

class ResearcherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Researcher::factory(3)->create();
    }
}
