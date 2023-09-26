<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('password'),
                'role'=>'admin'
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('password'),
                'role'=>'user'
            ],
            [
                'name'=>'editor',
                'email'=>'editor@gmail.com',
                'password'=>bcrypt('password'),
                'role'=>'editor'
            ]
            ];


            foreach($users as $user){
                User::create($user);
            }
        $this->call([BookSeeder::class,CartSeeder::class]);
    }
}
