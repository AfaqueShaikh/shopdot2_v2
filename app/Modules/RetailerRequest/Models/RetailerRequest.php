<?php

namespace App\Modules\RetailerRequest\Models;
use Illuminate\Database\Eloquent\Model;
class RetailerRequest extends Model
{
    public function brand(){
        return $this->belongsTo('App\User', 'brand_id', 'id');
    }
    public function retailer(){
        return $this->belongsTo('App\User', 'retailer_id', 'id');
    }
}
