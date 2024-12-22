<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Book One',
            'author' => 'Author One',
            'published_at' => '2023-01-01',
            'status' => true,
            'borrowable_type' => 'App\Models\User',
            'borrowable_id' => 1,
        ]);

       
        User::factory()->count(5)->create()->each(function ($user) {
            $user->borrowedBooks()->createMany(
                Book::factory()->count(3)->make()->toArray()
            );
        });
    }
}
