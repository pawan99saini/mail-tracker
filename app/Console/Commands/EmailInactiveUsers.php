<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NotifyUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Log;

class EmailInactiveUsers extends Command
{

    protected $signature = 'email:users';

    protected $description = 'Email to Inactive Users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $limit = Carbon::now()->subDay(30);
        $inactive_user = User::where('created_at', '<', $limit)->get();

        foreach ($inactive_user as $user) {
            $user->notify(new NotifyUser());
        }
        return true;
    }
}

