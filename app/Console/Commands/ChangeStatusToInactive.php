<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ChangeStatusToInactive extends Command
{
    protected $signature = 'user:change-status-inactive';
    protected $description = 'Change status to inactive for users with "test" in their email';

    public function __construct()
    {
        parent::__construct();
    }

    // to find users where email contains test and change status from active to inactive and sum how many users are changed successfully

    public function handle()
    {
        $users = User::where('email', 'like', '%test%')->get();
        $userCount = 0;

        foreach ($users as $user) {
            $user->status = 'inactive';
            $user->save();
            $userCount++;
        }

        $this->info("$userCount users' status have been changed to inactive.");
    }

    // you can run this coomand in terminal 'php artisan user:change-status-inactive'

}
