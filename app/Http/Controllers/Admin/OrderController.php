<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Customer;
use App\Model\OrderDetail;
use App\Model\Staff;
use App\Model\Service;
class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::with('customer')->get();
    	return view('admin.order.index',compact('orders'));
    }

    public function detail($id)
    {
    	$order = Order::findOrFail($id);
    	$orders = Order::with(['customer','order_details'])->where('id',$id)->first();
		foreach ($orders->order_details as $detail) {
            $data = unserialize($detail->detail);
            foreach ($data['staff_id'] as $value) {
    			$staffs[] = Staff::where('id',$value)->first();
            }
            foreach ($data['service_id'] as $value) {
                $services[] = Service::where('id',$value)->first();
            }
		}
    	return view('admin.order.detail',compact(['orders','staffs','services']));
    }
}
