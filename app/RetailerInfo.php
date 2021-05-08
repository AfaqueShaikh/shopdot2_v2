<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailerInfo extends Model
{
    protected $table = "retailer_info";

    protected $fillable = ['user_id','business_name','website_address','platform','interact_with_customer','find_new_brand','category','values','shopify_url','invited_brands_email'];
}
