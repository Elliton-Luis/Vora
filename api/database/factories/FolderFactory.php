<?php

namespace Database\Factories;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\Factory;

class FolderFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->word(),
        ];
    }
}
