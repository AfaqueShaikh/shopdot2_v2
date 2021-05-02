<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'agree_term',
        'user_type',
        'user_status',
        'remember_token',
        'activation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bankDetails(){
        return $this->hasOne('App\Modules\Brand\Models\BankDetail','user_id','id');
    }
    public function businessDetails(){
        return $this->hasOne('App\Modules\Brand\Models\BusinessDetail','user_id','id');
    }
    public function shippingDetails(){
        return $this->hasOne('App\Modules\Brand\Models\ShippingDetail','user_id','id');
    }
}
