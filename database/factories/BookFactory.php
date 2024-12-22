<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'published_at' => $this->faker->date(),
            'status' => $this->faker->boolean(),
            'borrowable_type' => 'App\Models\User', // موديل افتراضي
            'borrowable_id' => 1, // معرف كيان افتراضي
        ];
    }
}
