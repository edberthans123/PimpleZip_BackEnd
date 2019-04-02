<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Role;

class LoginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $user = Role::all()->where('rolename','User')->pluck('id')->toArray();
      $consultant = Role::all()->where('rolename','Consultant')->pluck('id')->toArray();
      $admin = Role::all()->where('rolename','Admin')->pluck('id')->toArray();

      foreach(range(1,10)as $index){
        DB::table('logins')->insert([
          'id' => $index,
          'email' => $faker->email,
          'password' => Hash::make('walamak'),
          'role_id' => $user[0],
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]); //making 10 dummy user data with password "walamak"
      }

      foreach(range(11,20)as $index){
          DB::table('logins')->insert([
            'id' => $index,
            'email' => $faker->email,
            'password' => Hash::make('walamak'),
            'role_id' => $consultant[0],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]); //making 10 dummy consultants data with password "walamak"
      }

      foreach(range(21,30)as $index){
          DB::table('logins')->insert([
            'id' => $index,
            'email' => $faker->email,
            'password' => Hash::make('walamak'),
            'role_id' => $admin[0],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]); //making 10 dummy admin data with password "walamak"
      }

}
}
