<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function category(){
        return $this->belongsTo(Catagory::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function contracts(){
        return $this->belongsToMany(Contract::class, 'product_contract');
    }
}
