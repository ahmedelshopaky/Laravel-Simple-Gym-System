<?php

namespace App\Console\Commands;

use App\Http\Resources\GymMemberEmailResource;
use App\Models\GymMember;
use App\Models\User;
use App\Notifications\MemberMissed;
use App\Notifications\MemberVerified;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;


class NotifyMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users-not-logged-in-for-month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send an email notification to users who didn’t log in from the
    past month';

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
        $users = GymMember::with('user')->where('last_login' ,'<',Carbon::now()->subDays(30)->toDateTimeString())->get();
      
        foreach($users as $user){
            Notification::send($user->user,new MemberMissed($user->user));
        }
        
    }
}
