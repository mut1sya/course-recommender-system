<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentsTableSeeder::class);
        $this->call(ResearchersTableSeeder::class);
        $this->call(VerifiersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        // $this->call(RatingsTableSeeder::class);
        // $this->call(ViewsTableSeeder::class);
    }
}
