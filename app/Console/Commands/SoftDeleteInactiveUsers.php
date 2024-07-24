<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SoftDeleteInactiveUsers extends Command
{
    protected $signature = 'user:soft-delete-inactive';
    protected $description = 'Soft delete users whose status is inactive';

    public function __construct()
    {
        parent::__construct();
    }

    // delete all users where status is inactive and sum how many users are deleted

    public function handle()
    {
        $users = User::where('status', 'inactive')->get();
        $userCount = 0;

        foreach ($users as $user) {
            $user->delete();
            $userCount++;
        }

        $this->info("$userCount users have been soft deleted.");
    }

    // you can run this coomand in terminal 'php artisan user:soft-delete-inactive'
}
