<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Service;

use App\Http\Request\Service\AddService;
use App\Http\Request\Service\EditService;

class ServiceController extends Controller
{
    public function index()
    {
    	$services = Service::all();
    	return view('admin.service.index',compact('services'));
    }

    public function create()
    {
    	return view('admin.service.create');
    }

    public function store(AddService $request)
    {
    	$data = $request->except('_token');
    	$add = Service::create($data);
    	$request->session()->flash('success', 'Thêm thành công!');
        return redirect()->route('service.index');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $status = 
            [
                '1' => 'Đang hoạt động',
                '0' => 'Đã tạm dừng'
            ];
        return view('admin.service.edit',compact(['service','status']));
    }

    public function update(EditService $request,$id)
    {
        $staff = Service::findOrFail($id);
        $data = $request->except('_token');
        $staff->update($data);
        $request->session()->flash('success', 'Cập nhật thành công!');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
    	$staff = Service::findOrFail($id);
    	$staff->delete();
    	$request->session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }
}
