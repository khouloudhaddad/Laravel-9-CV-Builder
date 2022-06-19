<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use App\Models\Profile;
use App\Models\Experience;
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
        $test_user = User::factory()->create([
            'name' => "Khouloud Haddad Amamou",
            'email' => "kh_haddad@gmail.com"
       ]);

       $profile = Profile::factory()->create([
         'user_id' => $test_user->id
       ]);
       Experience::factory(5)->create([
        'profile_id' => $profile->id
       ]);

       Link::factory(3)->create([
        'profile_id' =>$profile->id
       ]);
    }
}
