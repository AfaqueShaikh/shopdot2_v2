<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentCreatorInfo extends Model
{
    protected $table = "content_creator_info";

    protected $fillable = ['user_id','business_name','website_address','platform','content_type','about','values','shopify_url','invited_brands_email'];
}
