<?php

namespace Database\Seeders;

use App\Models\SimType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SimTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Sim có số'],
            ['title' => 'Sim không số'],
        ];

        SimType::truncate();
        SimType::insert($data);
    }
}
