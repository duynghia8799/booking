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
    	$orders = Order::with(['customer','order_details'])->where('id',$id)->get();
    	foreach ($orders as $order) {
    		foreach ($order->order_details as $detail) {
    			$staffs[] = Staff::where('id',$detail->staff_id)->first();
    			$services[] = Service::where('id',$detail->service_id)->first();
    		}
    	}
    	return view('admin.order.detail',compact(['orders','staffs','services']));
    }
}
