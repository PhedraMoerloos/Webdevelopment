<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participant;
use App\Period;


class ParticipantsController extends Controller
{

    public function store()
    {

      $participant = new Participant;

      //ingevulde velden
      $participant->firstname = request('firstname'); //name uit form
      $participant->lastname = request('lastname');
      $participant->address = request('address');
      $participant->city = request('city');
      $participant->zipcode = request('zipcode');

      //zelf bepalen
      $participant->ipaddress = request()->ip();
      $participant->competition_id = 1;

      //bepalen via methodes nog

      //methodes
      $period_id = Period::Determine_period();
      $period_answer = Period::getPeriodAnswer($period_id);


      $answered_correctly;
      if ( strcasecmp( request('answer'), $period_answer )  == 0 ) {
        $answered_correctly = true;
      }

      else {
        $answered_correctly = false;
      }


      $participant->period_id = $period_id;
      $participant->answered_correctly = $answered_correctly;


      $participant->save();

      return redirect('/');


    }


}
