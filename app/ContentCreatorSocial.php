<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentCreatorSocial extends Model
{
    protected $table = "content_creator_socials";

    protected $fillable = ['user_id','facebook','youtube','instagram','twitter','tel_code','whatsapp','messenger'];
}
