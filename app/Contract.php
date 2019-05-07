<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_contract');
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }
    
}
