<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

User::create([
    'name'=> 'Muhammad Furqan',
    'username'=> 'muhfurqan',
    'email'=> 'muhfurqans35@gmail.com',
    'password'=> bcrypt('12345')
]);
// article::create([
//     'title'=>'Judul 1',
//     'category_id'=>1,
//     'user_id'=>1,
//     'slug'=>'judul-1',
//     'excerpt'=>'Lorem ipsum dolor sit amet.',
//     'content'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ad, cum tempore assumenda totam veniam qui modi incidunt nisi cumque.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, cupiditate.</p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat mollitia fugiat necessitatibus quam. Sunt, eos.</p>'
//     ]);
// article::create(['title'=>'Judul 2',
//     'slug'=>'judul-2',
//     'category_id'=>2,
//     'user_id'=>1,
//     'excerpt'=>'Lorem ipsum dolor sit amet.',
//     'content'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ad, cum tempore assumenda totam veniam qui modi incidunt nisi cumque.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, cupiditate.</p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat mollitia fugiat necessitatibus quam. Sunt, eos.</p>'
//     ]);
// article::create(['title'=>'Judul 3',
//     'slug'=>'judul-3',
//     'category_id'=>3,
//     'user_id'=>1,
//     'excerpt'=>'Lorem ipsum dolor sit amet.',
//     'content'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ad, cum tempore assumenda totam veniam qui modi incidunt nisi cumque.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, cupiditate.</p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat mollitia fugiat necessitatibus quam. Sunt, eos.</p>'
//     ]);
User::factory(5)->create();
Article::factory(20)->create(); 
category::create([
    'name'=>'Programming',
    'slug'=>'programming'
]);
category::create([
    'name'=>'Gaming',
    'slug'=>'gaming'
]);
category::create([
    'name'=>'Tech',
    'slug'=>'tech'
]);

    }
}
