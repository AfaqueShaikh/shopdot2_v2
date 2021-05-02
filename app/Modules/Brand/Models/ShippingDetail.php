<?php

namespace App\Modules\Brand\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ShippingDetail extends Authenticatable
{
    public function shippingTime($userId){
        $shipping = ShippingDetail::where('user_id', $userId)->first();
        return $shipping->time.' '.$this->convertUnit($shipping->unit);
    }
    public function convertUnit($unit){
        switch ($unit){
            case '1':
                return 'Days';
            case '2':
                return 'Hours';
        }
    }
}
