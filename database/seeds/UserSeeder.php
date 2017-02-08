<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create()->each(
		    function($user) {
		        factory(App\Post::class)->create(['user_id' => $user->id]);
		    }
		);
    }
}
