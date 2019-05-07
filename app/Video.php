<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function contract(){
        return $this->belongsTo(Contract::class);
    }
}
