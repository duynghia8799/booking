<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Order;
use App\Model\Service;
use App\Model\Staff;
use App\Model\OrderDetail;
use Illuminate\Http\Request;


use App\Http\Request\Booking;
use App\Http\Request\BookingUpdate;
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
        $data = [
            'staff_id' => $request->staff,
            'service_id' => $request->service,
        ];
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
            $order_detail = [
                'order_id'   => $addOrder->id,
                'detail' => serialize($data),
            ];
            $addOrderDetail = OrderDetail::insert($order_detail);
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
            $order_detail = [
                'order_id'   => $addOrder->id,
                'detail' => serialize($data),
            ];
            $addOrderDetail = OrderDetail::insert($order_detail);
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
                        $orders = Order::where('customer_id',$check_cutomer->id)->limit(5)->orderBy('created_at','desc')->get();
                        return view('client.invoice',compact('orders'));
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
        $check = Order::findOrFail($id);
        $orders = Order::with(['customer','order_details'])->where('id',$id)->first();
        foreach ($orders->order_details as $detail) {
            $data = unserialize($detail->detail);
            foreach ($data['staff_id'] as $value) {
                $staffs[] = Staff::where('id',$value)->where('status',config('common.status.active'))->first();
            }
            foreach ($data['service_id'] as $value) {
                $services[] = Service::where('id',$value)->where('status',config('common.status.active'))->first();
            }
        }
        return view('client.detail',compact(['orders','staffs','services']));
    }

    public function duplidateBook($id)
    {
        $check = Order::findOrFail($id);
        $staffs   = Staff::where('status',config('common.status.active'))->get();
        $services = Service::where('status',config('common.status.active'))->get();
        $order = Order::with('order_details')->where('id',$id)->first();
        foreach ($order->order_details as $detail) {
            $data = unserialize($detail->detail);
            foreach ($data['staff_id'] as $value) {
                $getStaff[] = Staff::where('id',$value)->where('status',config('common.status.active'))->first();
            }
            foreach ($data['service_id'] as $value) {
                $getService[] = Service::where('id',$value)->where('status',config('common.status.active'))->first();
            }
        }
        return view('client.update', compact(['staffs', 'services','order','getStaff','getService']));
    }
    public function updateBook(BookingUpdate $request,$id)
    {
        $order = Order::with('customer')->where('id',$id)->first();
        $data = [
            'staff_id' => $request->staff,
            'service_id' => $request->service,
        ];
        /*
         *   Insert to table Order
         */
        $order = [
            'customer_id'   => $order->customer->id,
            'number_person' => $request->partner,
            'note' => $request->note,
            'start_at'      => $request->start_at,
        ];
        $addOrder = Order::create($order);
        /*
         *   Insert to table Order detail
         */
        $order_detail = [
            'order_id'   => $addOrder->id,
            'detail' => serialize($data),
        ];
        $addOrderDetail = OrderDetail::insert($order_detail);
        $request->session()->flash('success', 'Đặt lịch thành công!');
        return redirect()->back();
    }
}
