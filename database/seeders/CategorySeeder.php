<?php

namespace Database\Seeders; // <-- INI HARUS Database\Seeders

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // <-- Pastikan ini ada

class CategorySeeder extends Seeder // <-- Nama kelas harus CategorySeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Makanan'],
            ['name' => 'Minuman'],
            ['name' => 'Camilan'],
        ]);
    }
}