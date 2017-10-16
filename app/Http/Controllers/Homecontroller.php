<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competition;
use App\Period;
use App\Participant;


class HomeController extends Controller
{


    public function index()
    {

        //info wedstrijd
        $competition = Competition::first();

        //toon winnaars (als er al zijn)
        $winners = Participant::where('is_winner', 1)->get();


        //bepaal periode (nummer) op dit moment
        $period_id = Period::Determine_period();

        //toon juiste vraag afh van periode nu --> in periode 2 object bv
        $period_object = Period::where('id', $period_id)->first();


        return view('index', compact('competition', 'period_object', 'winners'));

    }


}
