<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(rand(3, 7)),
            'main_image' => 'images/recipes/' . $this->faker->randomElement(['recipe1.jpg', 'recipe2.jpg', 'recipe3.jpg']),
            'user_id' => User::factory(),
            'description' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id, // <-- BARIS PENTING INI HARUS ADA
        ];
    }
}