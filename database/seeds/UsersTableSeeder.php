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
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'phone' => '+254711111111',
            'email' => 'super@admin.com',
            'role_id' => 1,
            'password' => bcrypt('test@123'),
        ]);
    }
}
