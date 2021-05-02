<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function category(){
        return $this->belongsTo('App\Modules\Category\Models\Category','category_id','id');
    }
    public function variants(){
        return $this->hasMany('App\Modules\Product\Models\ProductVariant','product_id','id');
    }
    public function detailImages(){
        return $this->hasMany('App\Modules\Product\Models\ProductDetailImage','product_id','id');
    }
    public function accessRequest(){
        return $this->hasMany('App\Modules\RetailerProduct\Models\RetailerProduct','retailer_id','id')->where('retailer_id', Auth::user()->id);
    }
}
