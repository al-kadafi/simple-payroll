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
            'birth_place' => 'Surabaya',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'staff',
            'status' => 'permanent',
            'join_date' => '2023-01-20',
            'salary' => 5000000,
            'allowance' => 2000000,
        ]);

        DB::table('employees')->insert([
            'name' => 'Mona Lott',
            'birth_place' => 'Gresik',
            'birth_date' => '1992-10-02',
            'gender' => 'female',
            'position' => 'lead',
            'status' => 'contract',
            'join_date' => '2022-01-20',
            'salary' => 8000000,
            'allowance' => 1000000,
        ]);

        DB::table('employees')->insert([
            'name' => 'Ivana Tinkle',
            'birth_place' => 'Sidoarjo',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'staff',
            'status' => 'freelance',
            'join_date' => '2020-01-20',
            'salary' => 4000000,
            'allowance' => 1000000,
        ]);

        DB::table('employees')->insert([
            'name' => 'Brian Baker',
            'birth_place' => 'Surabaya',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'staff',
            'status' => 'permanent',
            'join_date' => '2023-01-20',
            'salary' => 5000000,
            'allowance' => 1000000,
        ]);

        DB::table('employees')->insert([
            'name' => 'Anita Bath',
            'birth_place' => 'Surabaya',
            'birth_date' => '1990-10-02',
            'gender' => 'female',
            'position' => 'supervisor',
            'status' => 'permanent',
            'join_date' => '2021-01-20',
            'salary' => 8000000,
            'allowance' => 2000000,
        ]);

        DB::table('employees')->insert([
            'name' => 'Eileen Dover',
            'birth_place' => 'Jakarta',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'manager',
            'status' => 'permanent',
            'join_date' => '2022-01-20',
            'salary' => 10000000,
            'allowance' => 3000000,
        ]);

        DB::table('employees')->insert([
            'name' => 'Ann Chovey',
            'birth_place' => 'Jakarta',
            'birth_date' => '1990-10-02',
            'gender' => 'male',
            'position' => 'Director',
            'status' => 'permanent',
            'join_date' => '2018-01-20',
            'salary' => 15000000,
            'allowance' => 1000000,
        ]);
    }
}
