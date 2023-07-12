<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
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
        User::truncate();
        Category::truncate();
        Post::truncate();

        // User::factory()->create();

        // Category::create(['name'=>'Waifus', 'slug'=>'waifus']);

        // Post::create(['title'=>'My Himeko Post','user_id'=>'1','category_id'=>1 ,'slug'=>'my-fourth-post','excerpt'=>'Himeko  best waifu','body'=>'Debo farmear reliquias']);
        $user = User::factory()->create([
            'name' => 'Himeko Booba'
        ]);
        Post::factory(3)->create([
            'user_id' =>$user->id
        ]);
        Post::factory(15)->create();

    }
}
