<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Login;
use App\Role;

class ConsultantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $role = Role::all()->where('rolename','Consultant')->pluck('id')->toArray();
        $consultantid = Login::all()->where('role_id',$role[0])->pluck('id')->toArray();
        $count = 0;
        foreach(range(1,10)as $index){
          DB::table('consultants')->insert([
            'id' => $index,
            'name' => $faker->name,
            'date_of_birth' => $faker->date,
            'gender' => $faker->title,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'login_id' => $consultantid[$count],
            'picture' => $faker->imageUrl,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]);
          $count ++;
        } //dummy datas for consultants table

    }
}
