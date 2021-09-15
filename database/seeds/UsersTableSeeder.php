<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'Alexies Iglesia',
            'email'=>'ialexies@gmail.com',
            'password'=>bcrypt('alexies')
        ]);
    }
}
