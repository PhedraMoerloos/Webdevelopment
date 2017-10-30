<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Period;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\CreateWinner::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        //checken welke periode we zijn, einddatum nemen voor 'day of month' en 'month',
        // om 23:59u uitvoeren --> kiezen winnaar en sturen mails
        $period_id = Period::Determine_period();
        $enddate = Period::where('id', $period_id)->first()->enddate;

        $day_of_month = date('j',strtotime($enddate));
        $month = date('n',strtotime($enddate));

        //zitten in timezone +1 --> uur -1 doen om hier om 23:59u een winnaar te kiezen
        //
        //        ┌───────────── min (0 - 59)
        //        │  ┌────────────── hour (0 - 23)
        //        │  │         ┌─────────────── day of month (1 - 31)
        //        │  │         │               ┌──────────────── month (1 - 12)
        //        │  │         │               │     ┌───────────────── day of week (0 - 6) (0 to 6 are Sunday to Saturday)
        //        │  │         │               │     │
        //        │  │         │               │     │
        //->cron('59 22 '.$day_of_month.' '.$month.' *');


        $schedule->command('create:winner')
                 ->cron('59 22 '.$day_of_month.' '.$month.' *');


        /*$schedule->command('send:winnermail')
                   ->cron('59 22 '.$day_of_month.' '.$month.' *');


        $schedule->command('send:dailymail')
                 ->daily();*/

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
