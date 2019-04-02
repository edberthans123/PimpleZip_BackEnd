<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          RolesTableSeeder::class,
          LoginsTableSeeder::class,
          ConsultantsTableSeeder::class,
          UsersTableSeeder::class,
          FeedbacksTableSeeder::class
        ]); //calling this class would seed instantly all the called class above
    }
}
