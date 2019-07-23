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
    	DB::table('users')->insert([
            'name' => 'aprijaelani',
            'email' => 'aprijaelani25@gmail.com',
            'password' => bcrypt('123456'),
            'telepon' => '123456',
            'service_point_id' => '1',
            'level' => '1'
        ]);
    }
}
