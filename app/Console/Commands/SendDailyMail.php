<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Competition;
use App\Participant;

use Illuminate\Support\Facades\Mail;
use App\Mail\ListParticipants;


class SendDailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:dailymail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily mail to the competition manager listing the participants.';

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
     * @return mixed
     */
    public function handle()
    {

        $recipient = Competition::first()->competition_manager_email;

        Mail::to($recipient)->send(new ListParticipants());

    }
}
