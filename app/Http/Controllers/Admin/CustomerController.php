<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\Http\Request\Customer\EditCustomer;
use Yajra\Datatables\Datatables;
class CustomerController extends Controller
{
	public function index()
    {
    	return view('admin.customer.index');
    }

    public function datatables(Request $request)
    {  
        if(request()->ajax()) {
            $customers = Customer::all();
            return Datatables::of($customers)
                ->editColumn('code', function ($customer) {
                    if ($customer->code != null) {
                        return '<p class="text-success">'.$customer->code.'</p>';
                    } else {
                        return '<p class="text-danger">'.'Chưa có mã code'.'</p>';
                    }
                })
                ->addColumn('action', function ($customer) {
                    return  
                    '<div class="dropdown">
                        <span aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
                            <i class="flaticon-folder">
                            </i>
                        </span>
                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -125px, 0px);" x-placement="top-start">
                            <a class="dropdown-item" href="'.route('customer.edit',$customer->id).'">
                                <i class="la la-edit text-success">
                                </i>
                                Tạo/Hủy mã code
                            </a>
                        </div>
                    </div>';

                })
                ->rawColumns(['code','action'])
                ->make(true);
        }
    }

    public function edit($id)
    {
    	$customer = Customer::findOrFail($id);
    	return view('admin.customer.edit',compact('customer'));
    }

    public function update(EditCustomer $request, $id)
    {
    	$customer = Customer::findOrFail($id);
    	$customer->update(['code' => $request->code]);
    	$request->session()->flash('success', 'Cập nhật thành công!');
        return redirect()->back();
    }

    public function updateCode(Request $request)
    {
    	$data = null;
    	$customers = Customer::all();
    	foreach ($customers as $customer) {
    		$customer->code = null;
    		$customer->save();
    	}
    	$request->session()->flash('success', 'Cập nhật thành công!');
        return redirect()->back();
    }
}
