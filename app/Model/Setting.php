<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
    	'email',
    	'hotline',
    	'address',
    	'time_open',
    	'google_map',
    	'link_fb',
    ];
}
