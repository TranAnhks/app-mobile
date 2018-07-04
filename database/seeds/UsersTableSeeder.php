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
        //
        // $users = factory(App\User::class, 3)->create();
         DB::table('users')->insert([
            'name' => 'Tuấn Anh',
            'email' => 'anh@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '0123456789',
            'address' => '10 abc',
            'facebook_id' => '',
            'verifyToken' => '',
            'status' => '1',
        ]);
    }
}
