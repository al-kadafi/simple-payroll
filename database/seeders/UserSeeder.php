<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Fulan',
            'email' => 'fulan@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => 'fulan@email.com',
            'remember_token' => Str::random(10),
            'role' => 'supervisor',
        ]);

        DB::table('users')->insert([
            'name' => 'Fulanah',
            'email' => 'fulanah@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => 'fulanah@email.com',
            'remember_token' => Str::random(10),
            'role' => 'staff',
        ]);
    }
}
