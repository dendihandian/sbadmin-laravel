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
        if (!User::where('email', ($email = 'admin@laravel.test'))->exists()) {
            $user = User::factory()->new()->create([
                'email' => $email,
                'password' => Hash::make('password'),
            ]);

            $user->assignRole('administrator');
        }
    }
}
