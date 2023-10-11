<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Dummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('tbl_user')->insert([
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('admin'),
       ]);

       DB::table('tbl_user')->insert([
            'username' => 'operator',
            'role' => 'operator',
            'password' => Hash::make('operator'),
       ]);
    }
}