<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\Http\Request\Customer\EditCustomer;

class CustomerController extends Controller
{
	public function index()
    {
    	$customers = Customer::all();
    	return view('admin.customer.index',compact('customers'));
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
