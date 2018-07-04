<?php

use Illuminate\Database\Seeder;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       	//$admins = factory(App\Admin::class, 3)->create();
         DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
