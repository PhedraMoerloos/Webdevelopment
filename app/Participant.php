<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{


    //deze mogen niet geMass assigned worden
    protected $quarded = ['period_id', 'answered_correctly'];




    public static function Determine_winner($period)
    {
               //= Participant::
      $id_winner = static::where([

          ['period_id', $period],
          ['answered_correctly', '1']

      ])->inRandomOrder()->first()->id;

      return $id_winner;

    }




    public static function Create_winner($id_winner)
    {
        //op deze manier geeft MassAssignment error
        /*$winner = Participant::findorFail( $id );
        $winner->update(['is_winner'=> 1]);*/
        static::where('id', $id_winner)->update(['is_winner' => 1]);

        return true;

    }





    public function competition()
    {

      //participant belongs to 1 competition
      return $this->belongsTo(Competition::class);

    }



    public function period()
    {

      //participant belongs to 1 period
      return $this->belongsTo(Period::class);

    }


}
