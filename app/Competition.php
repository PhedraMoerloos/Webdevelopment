<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{


  public static function Edit_CompManagerEmail( $request )
  {
              
      static::where('id', 1)->update(['competition_manager_email' => $request]);

      return true;

  }



  public function periods()
  {

    //competition has multiple periods
    return $this->hasMany(Period::class);

  }


  public function participants()
  {

    //competition has multiple participants
    return $this->hasMany(Participant::class);

  }


}
