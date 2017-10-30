<?php

namespace App\Mail;

use App\Participant;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListParticipants extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $valid_participants;
    public function __construct()
    {

        $valid_participants = Participant::where('is_allowed_to_play', 1)->get();
        $this->valid_participants = $valid_participants;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //subject, inhoud (view), naar wie(db),..
        return $this->view('emails.list-participants')
                    ->text('emails.list-participants');


    }
}
