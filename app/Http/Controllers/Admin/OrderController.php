<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Customer;
use App\Model\OrderDetail;
use App\Model\Staff;
use App\Model\Service;

use Yajra\Datatables\Datatables;
class OrderController extends Controller
{
    public function index()
    {
        $status = 
            [
                '1' => 'Đã xác nhận',
                '0' => 'Chưa xác nhận'
            ];
        return view('admin.order.index',compact('status'));
    }

    public function datatables(Request $request)
    {
        
        if(request()->ajax()) {
            if ($request->get('searchByStatus') != null) {
                $status = $request->get('searchByStatus');
                $orders = Order::with('customer')->where('status',$status)->get();
            } else {
                $orders = Order::with('customer')->get();
            }
            return Datatables::of($orders)
               ->editColumn('name_customer', function ($order) {
                    return '<span class="text-success" style="text-transform: uppercase;">
                                '.$order->customer->name.'
                            </span>';
                })
               ->editColumn('phone_customer', function ($order) {
                    return  $order->customer->phone;
                })
               ->editColumn('start_at', function ($order) {
                    return  'Ngày '.date('d/m/Y', strtotime($order->start_at)). ' vào lúc ' .date('H:i:s', strtotime($order->start_at));
                })
               ->editColumn('phone_customer', function ($order) {
                    return  $order->customer->phone;
                })
                //    ->editColumn('note', function ($order) {
                //         if ($order->note == null||$order->note=='[]') {
                //             return 'Không có dịch vụ thêm!';
                //         } else {
                //             $extraservices = Service::where('status', config('common.status.active'))->where('isTreatment', 1)->orderBy('priority')->get();
                //             $extraServiceChoosen='';
                //             $extraServiceIDs=json_decode($order->note, TRUE);
                //             foreach ($extraServiceIDs as $serviceId) {
                //                 foreach ($extraservices as $service) {
                //                     if($service['id']===$serviceId){
                //                         $extraServiceChoosen+=$extraServiceChoosen==''?($service->name):(', '+($service->name));
                //                     }
                //                 }
                //             }
    
                //             return $extraServiceChoosen;
                //         }
                //     })
                ->editColumn('note', function ($order) {
                    if ($order->note == null) {
                        return 'Không có ghi chú!';
                    } else {
                        return $order->note;
                    }
                })
               ->editColumn('status', function ($order) {
                    if ($order->status == config('common.status.active')) {
                        return '<span class="text-success">Đã xác nhận</span>';
                    } else {
                        return '<span class="text-danger">Chưa xác nhận</span>';
                    }
                })
                ->addColumn('action', function ($order) {
                    return  
                    '<div class="dropdown">
                        <span aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
                            <i class="flaticon-folder">
                            </i>
                        </span>
                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -125px, 0px);" x-placement="top-start">
                            <a class="dropdown-item" href="'.route('order.update',$order->id).'">
                                <i class="flaticon-interface-1 text-success">
                                </i>
                                Xác nhận duyệt
                            </a>
                            <a class="dropdown-item" href="'.route('order.detail',$order->id).'">
                                <i class="la la-edit text-success">
                                </i>
                                Xem chi tiết
                            </a>
                        </div>
                    </div>';

                })
                ->rawColumns(['name_customer','status','action'])
                ->make(true);
        }
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => config('common.status.active')]);
        $request->session()->flash('success', 'Duyệt thành công!');
        return redirect()->route('order.index');
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        $orders = Order::with(['customer','order_details'])->where('id',$id)->first();
        foreach ($orders->order_details as $detail) {
            $data = unserialize($detail->detail);
            if ($data['staff_id']) {
                foreach ($data['staff_id'] as $value) {
                    $staffs[] = Staff::where('id',$value)->first();
                }
            } else {
                $staffs = '';
            }
            foreach ($data['service_id'] as $value) {
                $services[] = Service::where('id',$value)->first();
            }
        }
        return view('admin.order.detail',compact(['orders','staffs','services']));
    }
}
