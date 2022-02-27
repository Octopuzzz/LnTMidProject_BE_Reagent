<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => '3D Animation',
            'slug' => '3d-animation',
        ]);
        Category::create([
            'name' => 'Game Development',
            'slug' => 'game-development'
        ]);
        Category::create([
            'name' => 'Beauty',
            'slug' => 'beauty'
        ]);
        User::factory(5)->create();
        Post::factory(20)->create();
    }
}
