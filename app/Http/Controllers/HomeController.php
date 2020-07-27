<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Order;
use App\Model\Service;
use App\Model\Staff;
use App\Model\OrderDetail;
use Illuminate\Http\Request;


use App\Http\Request\Booking;
class HomeController extends Controller
{

    public function index()
    {
        $staffs   = Staff::where('status',config('common.status.active'))->get();
        $services = Service::where('status',config('common.status.active'))->get();
        return view('client.index', compact(['staffs', 'services']));
    }

    public function booking(Booking $request)
    {
        $check_customer = Customer::where('phone', $request->phone)->first();
        if ($check_customer == null) {
            /*
             *   Insert to table Customer
             */
            $customer = [
                'name'  => $request->fullname,
                'phone' => $request->phone,
            ];
            $addCustomer = Customer::create($customer);
            /*
             *   Insert to table Order
             */
            $order = [
                'customer_id'   => $addCustomer->id,
                'number_person' => $request->partner,
                'note' => $request->note,
                'start_at'      => $request->start_at,
            ];
            $addOrder = Order::create($order);
            /*
             *   Insert to table Order detail
             */
            for ($i = 0; $i < count($request->service); $i++) {
                $order_detail = [
                    'order_id'   => $addOrder->id,
                    'service_id' => $request->service[$i],
                    'staff_id'   => $request->staff[$i],
                ];
                $orderDetail[] = $order_detail;
            }
            $addOrderDetail = OrderDetail::insert($orderDetail);
        } 
        else {
            /*
             *   Insert to table Order
             */
            $order = [
                'customer_id'   => $check_customer->id,
                'number_person' => $request->partner,
                'note' => $request->note,
                'start_at'      => $request->start_at,
            ];
            $addOrder = Order::create($order);
            /*
             *   Insert to table Order detail
             */
            for ($i = 0; $i < count($request->service); $i++) {
                $order_detail = [
                    'order_id'   => $addOrder->id,
                    'service_id' => $request->service[$i],
                    'staff_id'   => $request->staff[$i],
                ];
                $orderDetail[] = $order_detail;
            }
            $addOrderDetail = OrderDetail::insert($orderDetail);
        }
        $request->session()->flash('success', 'Đặt lịch thành công!');
        return redirect()->back();
    }

    public function history(Request $request)
    {
        if ($request->phone_history == null && $request->code_history == null) {
            $request->session()->flash('error', 'Không tồn tại thông tin');
            return redirect()->back();
        } else if ($request->phone_history != null || $request->code_history != null) {
            $check_cutomer = Customer::where('phone',$request->phone_history)->first();
            if ($check_cutomer == null) {
                $request->session()->flash('error', 'Không tồn tại thông tin');
                return redirect()->back();
            } else {
                if($check_cutomer->code == null) {
                    $request->session()->flash('error', 'Quý khách chưa có mã code. Vui lòng liên hệ với chúng tôi để lấy mã code');
                    return redirect()->back();
                } else {
                    if ($check_cutomer->code === $request->code_history) {
                        $orders = Order::with('order_details')->where('customer_id',$check_cutomer->id)->limit(5)->orderBy('created_at','desc')->get();
                        foreach ($orders as $order) {
                            foreach ($order->order_details as $detail) {
                                $staffs[] = Staff::where('id',$detail->staff_id)->first();
                                $services[] = Service::where('id',$detail->service_id)->first();
                            }
                        }
                        return view('client.invoice',compact(['staffs','services','orders']));
                    } else {
                        $request->session()->flash('error', 'Sai mã code');
                        return redirect()->back();
                    }
                }
            }
        }

    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $orders = Order::with(['customer','order_details'])->where('id',$id)->get();
        foreach ($orders as $order) {
            foreach ($order->order_details as $detail) {
                $staffs[] = Staff::where('id',$detail->staff_id)->first();
                $services[] = Service::where('id',$detail->service_id)->first();
            }
            // $staffs = $staff;
        }
                // dd($services);
        return view('client.detail',compact(['orders','staffs','services']));
    }
}
