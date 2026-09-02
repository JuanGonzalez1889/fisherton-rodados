<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name'       => 'Admin',
            'email'      => 'frodados@admin.com',
            'password'   => Hash::make('1234'),
            'role'       => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}