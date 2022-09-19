<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("users")->insert(
            array(
                    
                    'name' => 'user',
                    'lastname' => 'one',
                    'username' => 'master',
                    'role' => '1',
                    'email' => 'one@gmail.com',               
                    'password' => bcrypt('1234'),
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
            )
        );
        \DB::table("users")->insert(
            array(
                    
                    'name' => 'user',
                    'lastname' => 'two',
                    'username' => 'knogth',
                    'role' => '1',
                    'email' => 'two@gmail.com',               
                    'password' => bcrypt('1234'),
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
            )
        );
    }
}
