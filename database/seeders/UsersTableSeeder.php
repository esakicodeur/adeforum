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
            'name'     => 'Alex Esaki',
            'username'     => 'alex',
            'email'    => 'apachecordovax@gmail.com',
            'password' => bcrypt('passe123'),
            'type'     => User::ADMIN,
        ]);

        User::factory()->create([
            'name'     => 'M. Amakam',
            'username'     => 'ama',
            'email'    => 'amakam37@gmail.com',
            'password' => bcrypt('passe123'),
            'type'     => User::ADMIN,
        ]);

        User::factory()->create([
            'name'     => 'John Doe',
            'username'     => 'johndoe',
            'email'    => 'john@example.com',
            'password' => bcrypt('password'),
            'type'     => User::DEFAULT,
        ]);

        User::factory()->create([
            'name'     => 'Brad Traversy',
            'username'     => 'brad',
            'email'    => 'traversymedia@gmail.com',
            'password' => bcrypt('passe123'),
            'type'     => User::DEFAULT,
        ]);

        User::factory()->count(10)->create();
    }
}
