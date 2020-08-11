<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Order;
use App\Model\Service;
use App\Model\Staff;
use App\Model\OrderDetail;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

use App\Http\Request\Booking;
use App\Http\Request\BookingUpdate;

class HomeController extends Controller
{

    public function index()
    {
        $inforWeb = Setting::get()->first();
        $staffs   = Staff::where('status', config('common.status.active'))->get();
        // 0 là liệu trình, 1 là dịch vụ
        // Lấy liệu trình
        $services = Service::where('status', config('common.status.active'))->where('isTreatment', 0)->orderBy('priority')->get();
        // Lấy dịch vụ thêm
        $extraservices = Service::where('status', config('common.status.active'))->where('isTreatment', 1)->orderBy('priority')->get();
        return view('client.index', compact(['staffs', 'inforWeb', 'services', 'extraservices']));
    }

    public function redirect()
    {
        return view('client.redirect');
    }

    public function booking(Booking $request)
    {
        if ($request->staff != null && count($request->staff) > count($request->service)) {
            $request->staff = array_slice($request->staff, 0, count($request->service));
        }
        $data = [
            'staff_id' => $request->staff,
            'service_id' => $request->service,
        ];
        $setting = Setting::all()->first();
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
        } else {
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
        /*
         *   Send email
         */
        if ($request->staff) {
            foreach ($request->staff as $value) {
                $staffs[] = Staff::where('id', $value)->first();
            }
        } else {
            $staffs = '';
        }
        foreach ($request->service as $value) {
            $services[] = Service::where('id', $value)->first();
        }
        foreach (json_decode($request->note) as $value) {
            $extraServiceChoosen[] = Service::where('status', config('common.status.active'))->where('id',$value)->first();
        }
        for ($i = 0 ; $i < count($extraServiceChoosen); $i++ ) {
            $choose[] = $extraServiceChoosen[$i]->description .'';
        }
        
        $dataSendMail = [
            'fullname' => $request->fullname,
            'phone'    => $request->phone,
            'start_at' => $request->start_at,
            'staff'    => $staffs,
            'service'  => $services,
            'note'     => $choose,
        ];
        \Mail::to($setting->email)->send(new \App\Mail\SendMail($dataSendMail));
        $request->session()->flash('success', 'Đặt lịch thành công!');
        return redirect()->back()->with('<script>window.close();</script>');
    }

    public function history(Request $request)
    {
        if ($request->phone_history == null && $request->code_history == null) {
            $request->session()->flash('error', 'Không tồn tại thông tin');
            return redirect()->back();
        } else if ($request->phone_history != null || $request->code_history != null) {
            $check_cutomer = Customer::where('phone', $request->phone_history)->first();
            if ($check_cutomer == null) {
                $request->session()->flash('error', 'Không tồn tại thông tin');
                return redirect()->back();
            } else {
                if ($check_cutomer->code === $request->code_history) {

                    $cookie = Cookie::queue('customer', $request->phone_history, 60);

                    $orders = Order::where('customer_id', $check_cutomer->id)->limit(5)->orderBy('created_at', 'desc')->get();
                    return view('client.invoice', compact('orders'));
                } else {
                    $request->session()->flash('error', 'Sai mã code');
                    return redirect()->back();
                }
            }
        }
    }

    public function invoice(Request $request, $id)
    {
        if ($request->cookie('customer')) {
            $check = Order::findOrFail($id);
            $orders = Order::with(['customer', 'order_details'])->where('id', $id)->first();
            foreach ($orders->order_details as $detail) {
                $data = unserialize($detail->detail);
                if ($data['staff_id']) {
                    foreach ($data['staff_id'] as $value) {
                        $staffs[] = Staff::where('id', $value)->where('status', config('common.status.active'))->first();
                    }
                } else {
                    $staffs = '';
                }
                foreach ($data['service_id'] as $value) {
                    $services[] = Service::where('id', $value)->where('status', config('common.status.active'))->first();
                }
            }
            return view('client.detail', compact(['orders', 'staffs', 'services']));
        } else {
            return abort(404);
        }
    }

    public function duplidateBook(Request $request, $id)
    {
        if ($request->cookie('customer')) {
            $check = Order::findOrFail($id);
            $staffs   = Staff::where('status', config('common.status.active'))->get();
            $services = Service::where('status', config('common.status.active'))->get();
            $order = Order::with('order_details')->where('id', $id)->first();
            foreach ($order->order_details as $detail) {
                $data = unserialize($detail->detail);
                if ($data['staff_id']) {
                    foreach ($data['staff_id'] as $value) {
                        $getStaff[] = Staff::where('id', $value)->where('status', config('common.status.active'))->first();
                    }
                } else {
                    $getStaff = '';
                }
                foreach ($data['service_id'] as $value) {
                    $getService[] = Service::where('id', $value)->where('status', config('common.status.active'))->first();
                }
            }
            return view('client.update', compact(['staffs', 'services', 'order', 'getStaff', 'getService']));
        } else {
            return abort(404);
        }
    }
    public function updateBook(BookingUpdate $request, $id)
    {
        if ($request->cookie('customer')) {
            $order = Order::with('customer')->where('id', $id)->first();
            $data = [
                'staff_id' => $request->staff,
                'service_id' => $request->service,
            ];
            $setting = Setting::all()->first();
            if ($request->staff) {
                foreach ($request->staff as $value) {
                    $staffs[] = Staff::where('id', $value)->first();
                }
            } else {
                $staffs = '';
            }
            foreach ($request->service as $value) {
                $services[] = Service::where('id', $value)->first();
            }
            foreach (json_decode($request->note) as $value) {
                $extraServiceChoosen[] = Service::where('status', config('common.status.active'))->where('id',$value)->first();
            }
            for ($i = 0 ; $i < count($extraServiceChoosen); $i++ ) {
                $choose[] = $extraServiceChoosen[$i]->description .'';
            }
            $dataSendMail = [
                'fullname' => $order->customer->name,
                'phone'    => $order->customer->phone,
                'start_at' => $request->start_at,
                'staff'    => $staffs,
                'service'  => $services,
                'note'     => $choose,
            ];
            \Mail::to($setting->email)->send(new \App\Mail\SendMail($dataSendMail));
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
        } else {
            return abort(404);
        }
    }
    public function jsonHistory(Request $request)
    {
        if ($request->phone_history == null) {
            $result = [
                'key'   => 0,
                'value' => 'Không khả dụng!'
            ];
            return response()->json($result);
        } else {
            $check_cutomer = Customer::where('phone', $request->phone_history)->first();
            if ($check_cutomer == null) {
                $result = [
                    'key'   => 0,
                    'value' => 'Không có dữ liệu với số điện thoại này!'
                ];
                return response()->json($result);
            } else {
                if ($check_cutomer->code === null || $check_cutomer->code === $request->code_history) {
                    $orders = Order::with(['customer', 'order_details'])
                        ->where('customer_id', $check_cutomer->id)
                        ->limit(5)->orderBy('created_at', 'desc')->get();
                    $result = [
                        'key'   => 1,
                        'value' => $orders
                    ];
                    foreach ($orders as $order) {
                        $order_detail = OrderDetail::where('order_id', $order->id)->first();
                        $order_detail = unserialize($order_detail->detail);
                        $order_detail_id = (object) $order_detail;
                        $order['detailStaffs'] = Staff::whereIn('id', (array)$order_detail_id->staff_id)->get();
                        $order['detailServices'] = Service::whereIn('id', (array)$order_detail_id->service_id)->get();
                    }
                    return response()->json($result);
                } else {
                    $result = [
                        'key'   => 1,
                        'value' => null
                    ];
                    return response()->json($result);
                }
            }
        }
    }
}
