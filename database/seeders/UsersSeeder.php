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
        if (!User::where('email', 'admin@sbadmin.test')->exists()) {
            $user = User::factory()->new()->create([
                'email' => 'admin@laravel.test',
                'password' => Hash::make('password'),
            ]);

            $user->assignRole('administrator');
        }
    }
}
