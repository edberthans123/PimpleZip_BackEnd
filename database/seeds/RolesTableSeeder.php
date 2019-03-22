<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $contents = [
          "Consultant",
          "User",
          "Admin"
        ];

        foreach(range(1,3)as $index){
          DB::table('Roles')->insert([
            'id'=> $index,
            'rolename' => $contents[$index-1],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]);
        }
    }
}
