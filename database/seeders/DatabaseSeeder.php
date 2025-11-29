<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil CategorySeeder terlebih dahulu
        $this->call(CategorySeeder::class); // <-- Tambahkan baris ini

        // Buat user dummy
        User::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Membuat resep dummy (sekarang kategori sudah dijamin ada)
        Recipe::factory(10)->create();
    }
}