<?php

namespace App\Mail;

use App\Period;
use App\Participant;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class WinnerOfPeriod extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $winner;
    public function __construct()
    {

        $period_now = Period::Determine_period();
        $participants_period_now = Participant::where('period_id', $period_now)->get();
        $winner = Participant::where('is_winner', 1)->get();
        $this->winner = $winner->first();

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //subject, inhoud (view), naar wie(db),..
        return $this->view('emails.winners-period')
                    ->text('emails.winners-period')
                    ->with([
                        'firstname' => $this->winner->firstname,
                        'lastname' => $this->winner->lastname,
                    ]);

    }
}
