<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = User::create([
            'name' => 'Owner',
            'email' => 'owner@inventory',
            'password' => bcrypt('password')
        ]);

        $owner->assignRole('owner');

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@inventory',
            'password' => bcrypt('password')
        ]);

        $manager->assignRole('manager');
    }
}
