<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_registration extends Model
{
    protected $fillable = [

        'company_name',
        'tagline',
        'website_url',
        'company_email',
        'founder_name',
        'founder_email',
        'contact_number',
        'street_address',
        'city',
        'state',
        'country',
        'pin_code',
        'gstin',
        'office_open_at',
        'office_close_at',
        'establish_in',
        'facebook_url',
        'twitter_url',
        'whatsApp_number',
        'category',
        'erp_url'
    ];
}

