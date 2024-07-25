<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Alex Esaki',
            'email' => 'apachecordovax@gmail.com',
            'password' => bcrypt('passe123'),
            'type' => User::ADMIN,
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'type' => User::DEFAULT,
        ]);

        User::factory()->count(5)->create();
    }
}
