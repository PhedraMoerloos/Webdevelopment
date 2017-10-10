<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competition;
use App\Period;
use App\Participant;


class Homecontroller extends Controller
{


    public function index()
    {

        //info wedstrijd
        $competition = Competition::first();

        //toon winnaars (als er al zijn)
        $winners = Participant::where('is_winner', 1)->get();


        //bepaal periode (nummer) op dit moment
        $period_number = Period::Determine_period();

        //toon juiste vraag afh van periode nu --> in periode 2 object bv
        $period_object = Period::where('period_number', $period_number)->first();


        return view('welcome', compact('competition', 'period_object', 'winners'));

    }


}
