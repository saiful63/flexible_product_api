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
                'role'=>1
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('password'),
                'role'=>3
            ],
            [
                'name'=>'editor',
                'email'=>'editor@gmail.com',
                'password'=>bcrypt('password'),
                'role'=>2
            ]
            ];


            foreach($users as $user){
                User::create($user);
            }
        $this->call([BookSeeder::class,CartSeeder::class]);
    }
}
