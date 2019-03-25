<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Login;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $role = Role::all()->where('rolename','User')->pluck('id')->toArray();
      $userid = Login::all()->where('role_id','2')->pluck('id')->toArray();
      $count = 0;
      foreach(range(1,10)as $index){
        DB::table('users')->insert([
          'id' => $index,
          'name' => $faker->name,
          'date_of_birth' => $faker->date,
          'gender' => $faker->title,
          'address' => $faker->address,
          'phone' => $faker->phoneNumber,
          'login_id' => $userid[$count],
          'picture' => $faker->imageUrl,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ]);
        $count ++;
      }

    }
}
