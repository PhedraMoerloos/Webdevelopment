<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competition;
use App\Period;


class AdminController extends Controller
{

    public function index()
    {

      $competition = Competition::first();


      $periods = $competition->periods;

      return view('dashboard.dashboard', compact('competition', 'periods'));

    }



    public function edit()
    {

        $this->validate(request(), [

            'compManagerEmail'   =>    'required|email',
            'startDateP1'        =>    'required|date|before:endDateP1',
            'endDateP1'          =>    'required|date|after:startDateP1',
            'startDateP2'        =>    'required|date|before:endDateP2',
            'endDateP2'          =>    'required|date|after:startDateP2',
            'startDateP3'        =>    'required|date|before:endDateP3',
            'endDateP3'          =>    'required|date|after:startDateP3',
            'startDateP4'        =>    'required|date|before:endDateP4',
            'endDateP4'          =>    'required|date|after:startDateP4',

        ]);

        Competition::Edit_CompManagerEmail( request('compManagerEmail') );

        for ( $period_number = 1; $period_number < 5; $period_number++ ) {

            Period::Edit_PeriodStartDate( $period_number, request('startDateP'.strval($period_number)) );
            Period::Edit_PeriodEndDate( $period_number, request('endDateP'.strval($period_number)) );

        };


        return back();

    }


}
