<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::factory()->count(10)->create();

        // For each user, create 5 posts
        $users->each(function ($user) {
            Post::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        });

    }
}