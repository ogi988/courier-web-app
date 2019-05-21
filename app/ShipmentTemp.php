<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentTemp extends Model
{
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('shipment_number');
        
    }
}
