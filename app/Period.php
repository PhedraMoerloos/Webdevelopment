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



    public static function Edit_PeriodStartDate( $period_number, $request )
    {

        static::where('period_number', $period_number)->update(['startdate' => $request]);

        return true;

    }


    public static function Edit_PeriodEndDate( $period_number, $request )
    {

        static::where('period_number', $period_number)->update(['enddate' => $request]);

        return true;

    }




    public function competition()
    {

      //period belongs to 1 competition
      return $this->belongsTo(Competition::class);

    }




    public function participants()
    {

      //period has multiple participants
      return $this->hasMany(Participant::class);

    }





}
