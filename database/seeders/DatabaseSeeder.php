<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
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

        User::create([
            'name' => 'Yusuf Ahmad',
            'username' => 'Ahmadydev',
            'email' => 'ahmadydev@gmail.com',
            'password' => bcrypt('12345')
        ]);
        // User::create([
        //     'name' => 'andi ahmad',
        //     'username' => 'andiahmad',
        //     'email' => 'andi@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        User::factory(5)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'Networking',
            'slug' => 'networking'
        ]);
        Category::create([
            'name' => 'Desain',
            'slug' => 'desain'
        ]);

        Blog::factory(20)->create();

        // Blog::create([
        //     'judul' => 'Install Laravel',
        //     'slug' => 'install-laravel',
        //     'more' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Blog::create([
        //     'judul' => 'Install Mikrotik',
        //     'slug' => 'install-mikrotik',
        //     'more' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Blog::create([
        //     'judul' => 'Install Chr',
        //     'slug' => 'install-chr',
        //     'more' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Blog::create([
        //     'judul' => 'Install CorelDraw',
        //     'slug' => 'install-coreldraw',
        //     'more' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam voluptates non mollitia quia sunt impedit, aliquam veniam eos quaerat ea ab ipsum. Culpa, ipsum!',
        //     'category_id' => 3,
        //     'user_id' => 2
        // ]);
    }
}
