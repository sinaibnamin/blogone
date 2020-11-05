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
        App\User::create([
          'name'=>'sina',
          'email'=>'sinaibnamin@gmail.com',
          'password'=>bcrypt('12345678'),
        ]);
    }
}
