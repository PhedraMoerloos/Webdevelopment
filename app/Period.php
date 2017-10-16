<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Period;

class Period extends Model
{

    //als geen static plaatst --> verwacht dat je hier nog op gaat verder bouwen
    //(bv geef me alle participants uit periode 1 in deze functie, App\Period::Participant_period(1)->where('firstname', 'Phedra')->get();  )
    public static function Determine_period()
    {
                  //= Period::
        $period_now = static::where([

            ['startdate', '<=', NOW()],
            ['enddate', '>=', NOW()]

        ])->first()->id;

        return $period_now;

    }


    public static function getPeriodAnswer($period_id)
    {
                  //= Period::
        $periodAnswer = static::where('id', $period_id)->first()->answer;

        return $periodAnswer;

    }











}
