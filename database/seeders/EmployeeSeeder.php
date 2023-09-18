<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Brian Baker',
            'email' => 'brian@email.com',
            'birth_place' => 'Surabaya',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'staff',
            'status' => 'permanent',
            'join_date' => '2023-08-20',
            'basic_salary' => 5000000,
            'allowance' => 2000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Mona Lott',
            'email' => 'mona@email.com',
            'birth_place' => 'Gresik',
            'birth_date' => '1992-10-02',
            'gender' => 'female',
            'position' => 'lead',
            'status' => 'contract',
            'join_date' => '2022-01-20',
            'basic_salary' => 8000000,
            'allowance' => 1000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Ivana Tinkle',
            'email' => 'ivana@email.com',
            'birth_place' => 'Sidoarjo',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'staff',
            'status' => 'freelance',
            'join_date' => '2020-01-20',
            'basic_salary' => 4000000,
            'allowance' => 1000000,
            'insurance' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Baker John',
            'email' => 'john@email.com',
            'birth_place' => 'Surabaya',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'staff',
            'status' => 'permanent',
            'join_date' => '2023-01-20',
            'basic_salary' => 5000000,
            'allowance' => 1000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Anita Bath',
            'email' => 'bath@email.com',
            'birth_place' => 'Surabaya',
            'birth_date' => '1990-10-02',
            'gender' => 'female',
            'position' => 'supervisor',
            'status' => 'permanent',
            'join_date' => '2021-01-20',
            'basic_salary' => 8000000,
            'allowance' => 2000000,
            'insurance' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Eileen Dover',
            'email' => 'dover@email.com',
            'birth_place' => 'Jakarta',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'manager',
            'status' => 'permanent',
            'join_date' => '2017-01-20',
            'basic_salary' => 10000000,
            'allowance' => 3000000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Ann Chovey',
            'email' => 'ann@email.com',
            'birth_place' => 'Jakarta',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'Director',
            'status' => 'permanent',
            'join_date' => '2018-01-20',
            'basic_salary' => 15000000,
            'allowance' => 1000000,
            'insurance' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
