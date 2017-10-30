<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Period;
use App\Participant;

class CreateWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the winner of the period that has just ended.';

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

      echo "Starting job\n";

      $period_id = Period::Determine_period();

      $id_winner = Participant::Determine_winner($period_id);

      Participant::Create_winner($id_winner);

      echo "Job done\n";

    }
}
