<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fullname' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('123456'),
            ],
        ];

        User::truncate();
        User::insert($data);
    }
}
