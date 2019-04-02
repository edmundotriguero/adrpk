<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }
}
