<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customer;
use App\Model\OrderDetail;
class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
    	'customer_id',
    	'number_person',
    	'start_at',
    	'note',
    	'status',
    ];
    public function customer()
    {
    	return $this->belongsTo(Customer::class,'customer_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
