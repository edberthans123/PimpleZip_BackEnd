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
        DB::table('Logins')->insert([
          'id' => $index,
          'email' => $faker->email,
          'password' => Hash::make('password'),
          'role_id' => $user[0],
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
      }

      foreach(range(11,20)as $index){
          DB::table('Logins')->insert([
            'id' => $index,
            'email' => $faker->email,
            'password' => Hash::make('password'),
            'role_id' => $consultant[0],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]);
      }

      foreach(range(21,30)as $index){
          DB::table('Logins')->insert([
            'id' => $index,
            'email' => $faker->email,
            'password' => Hash::make('password'),
            'role_id' => $admin[0],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]);
      }

}
}
