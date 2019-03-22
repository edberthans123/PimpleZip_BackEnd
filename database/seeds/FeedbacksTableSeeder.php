<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Login;
use App\Role;
use App\Consultant;
use App\User;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //$roleu = Role::all()->where('rolename', 'User')->pluck('id')->toArray();
        $userid = User::all()->pluck('id')->toArray();

        //$rolec = Role::all()->where('rolename', 'Consultant')->pluck('id')->toArray();
        $consultantid = Consultant::all()->pluck('id')->toArray();
        $count = 0;
        foreach(range(1,10)as $index){
          DB::table('Feedback')->insert([
            'id' => $index,
            'user_id' => $userid[$count],
            'consultant_id' => $consultantid[$count],
            'message' => $faker->sentence,
            'rating' => $faker->randomDigit,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]);
          $count++;
        }
    }
}
