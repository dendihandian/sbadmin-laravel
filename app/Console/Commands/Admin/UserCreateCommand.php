<?php

namespace App\Console\Commands\Admin;

use App\Models\User;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Faker::create();

        $name = $faker->name;
        $email = $faker->email;
        $default_password = 'password';
        $hashed_password = Hash::make($default_password);

        $input_name = $this->ask("Enter name (default: $name)");
        $name = !empty($input_name) ? $input_name : $name;


        $input_email = $this->ask("Enter email (default: $email)");
        if (!empty($input_email) && (bool) strpos($input_email, '@')) {
            $this->error('Invalid email');
        } else if (!empty($input_email)) {
            $email = $input_email;
        }

        $input_password = $this->ask("Enter password (default: $default_password)");
        if (!empty($input_password) && strlen($input_password) < 8) {
            $this->error('The password must be at least 8 characters.');
        } else if (!empty($input_password)) {
            $hashed_password = Hash::make($input_password);
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password
        ]);

        $user->assignRole('administrator');

        $this->info('Admin created');

        return 0;
    }
}
