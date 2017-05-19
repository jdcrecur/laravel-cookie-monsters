<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'=> 'bob@google.com',
            'password' => bcrypt('VerySecure1'),
            'name' => 'Marc',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
