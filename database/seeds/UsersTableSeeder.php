<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

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
            'name' => 'Sample Admin',
            'username' => 'admin1',
            'password' => bcrypt('123123123'),
            'role' => 'administrator',
        ]);
    }
}
