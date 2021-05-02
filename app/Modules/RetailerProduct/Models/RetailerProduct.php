<?php

namespace App\Modules\RetailerProduct\Models;
use Illuminate\Database\Eloquent\Model;
class RetailerProduct extends Model
{
    public function product(){
        return $this->belongsTo('App\Modules\Product\Models\Product', 'product_id','id');
    }
}
