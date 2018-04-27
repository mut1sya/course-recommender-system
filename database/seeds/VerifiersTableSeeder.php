<?php

use Illuminate\Database\Seeder;

class VerifiersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Verifier::class,10)->create();
    }
}
