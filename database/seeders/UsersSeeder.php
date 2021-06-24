<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // NOTE: 
        // since the Faker\Factory is a dev dependency package, 
        // let's assume it won't installed on production.
        // so, use the model creation instead

        if (!User::where('email', ($email = 'admin@laravel.test'))->exists()) {
            $user = User::create([
                'email' => $email,
                'name' => 'admin',
                'password' => Hash::make('password'),
            ]);

            $user->assignRole('administrator');
        }
    }
}
