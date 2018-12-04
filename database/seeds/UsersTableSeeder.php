<?php

use Illuminate\Database\Seeder;
use App\User;

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

    	$user=  new User;
        $user->id = time();
        $user->name = "Safiullah Zalmai";
        $user->email = "safi@gmail.com";
        $user->password = bcrypt('safi@123');
        $user->isActive =1;
        $user->save();	
    }
}
