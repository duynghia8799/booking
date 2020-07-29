<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
class OrderDetail extends Model
{
    protected $table = 'orders_detail';
    protected $fillable = [
    	'order_id',
    	'detail',
    ];
    public function order()
    {
    	return $this->belongsTo(Customer::class,'order_id');
    }
}
