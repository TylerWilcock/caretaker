<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
          'email' => "Test Email",
          'password' => bcrypt('test123'),
          'first_name' => "Test First",
          'last_name' => "Test Last",
          'address' => "Test Address",          
          'phone' => "22222222220",
          'emergency_phone' => "1111111111",
          'birthday' => "1992/06/29",  
    ));
  }
}