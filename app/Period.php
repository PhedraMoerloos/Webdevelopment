<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Period;

class Period extends Model
{

    public function Determine_period()
    {

        $period_now = Period::where([

            ['startdate', '<=', NOW()],
            ['enddate', '>=', NOW()]

        ])->first()->period_number;


        return $period_now;

    }





}
