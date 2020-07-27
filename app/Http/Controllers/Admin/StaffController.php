<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Staff;

use App\Http\Request\Staff\AddStaff;
use App\Http\Request\Staff\EditStaff;

class StaffController extends Controller
{
    public function index()
    {
    	$staffs = Staff::all();
    	return view('admin.staff.index',compact('staffs'));
    }

    public function create()
    {
    	return view('admin.staff.create');
    }

    public function store(AddStaff $request)
    {
    	$data = $request->except('_token');
    	$add = Staff::create($data);
    	$request->session()->flash('success', 'Thêm thành công!');
        return redirect()->route('staff.index');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        $status = 
            [
                '1' => 'Đang làm việc',
                '0' => 'Đã nghỉ việc'
            ];
        return view('admin.staff.edit',compact(['staff','status']));
    }

    public function update(EditStaff $request,$id)
    {
        $staff = Staff::findOrFail($id);
        $data = $request->except('_token');
        $staff->update($data);
        $request->session()->flash('success', 'Cập nhật thành công!');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
    	$staff = Staff::findOrFail($id);
    	$staff->delete();
    	$request->session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }
}
