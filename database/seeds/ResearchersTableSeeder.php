<?php

use Illuminate\Database\Seeder;

class ResearchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Researcher::class,30)->create();
    }
}
