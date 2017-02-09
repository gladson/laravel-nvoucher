<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 150)->create()->each(
		    function($user) {
		        factory(App\Voucher::class)->create(['user_id' => $user->id]);
		    }
		);
    }
}
