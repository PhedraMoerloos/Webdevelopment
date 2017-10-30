<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
      
        //die specifieke mail versturen (uit map mail)

    }
}
