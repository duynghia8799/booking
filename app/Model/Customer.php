<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
    	'name',
    	'phone',
    	'code',
    ];
    public function orders()
    {
    	return $this->hasMany(Order::class);
    }
}
