<?php

namespace App\Console\Commands\Admin;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:user:reset-pw {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to reset an admin user password';

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
        $userEmail = $this->argument('email');

        if (!$user = User::where('email', $userEmail)->first()) {
            $this->info('User with the given email not found');
            return 0;
        }

        $newPassword = $this->secret('Input a new password and hit ENTER to save:');

        if (strlen($newPassword) >= 8) {
            $user->password = Hash::make($newPassword);
            $user->save();
        } else {
            $this->info('The password length must be equal or more than 8 characters');
            return 0;
        }

        $this->info('The password for the admin user has changed');

        return 0;
    }
}
