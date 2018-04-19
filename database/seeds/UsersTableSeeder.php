<?php

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
        //
        factory(App\User::class)->create()->each(function ($u) {
            if($u->role == 'student'){
                $u->student()->save(factory(App\Models\Student::class)->create());
            } else if($u->role == 'researcher'){
                $u->researcher()->save(factory(App\Models\Researcher::class)->create());
            } else{
                $u->verifier()->save(factory(App\Models\Verifier::class)->create());
            }
        });
    }
}
