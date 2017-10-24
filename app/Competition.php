<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{

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
