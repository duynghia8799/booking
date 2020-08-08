<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Staff;

use App\Http\Request\Staff\AddStaff;
use App\Http\Request\Staff\EditStaff;

use Yajra\Datatables\Datatables;
class StaffController extends Controller
{
    public function index()
    {
        $status = 
        [
            '1' => 'Đang làm việc',
            '0' => 'Đã nghỉ việc'
        ];
    	return view('admin.staff.index',compact('status'));
    }

    public function datatables(Request $request)
    {  
        if(request()->ajax()) {
            if ($request->get('searchByStatus') != null) {
                $status = $request->get('searchByStatus');
                $staffs = Staff::where('status',$status)->get();
            } else {
                 $staffs = Staff::all();
            }
            return Datatables::of($staffs)
                ->editColumn('description', function ($staff) {
                    if ($staff->description == null) {
                        return 'Không có ghi chú!';
                    } else {
                        return $staff->description;
                    }
                })
               ->editColumn('status', function ($staff) {
                    if ($staff->status == config('common.status.active')) {
                        return '<span class="text-success">Đang làm việc</span>';
                    } else {
                        return '<span class="text-danger">Đã nghỉ việc</span>';
                    }
                })
                ->addColumn('action', function ($staff) {
                    return  
                    '<div class="dropdown">
                        <span aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
                            <i class="flaticon-folder">
                            </i>
                        </span>
                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -125px, 0px);" x-placement="top-start">
                            <a class="dropdown-item" href="'.route('staff.edit',$staff->id).'">
                                <i class="la la-edit text-success">
                                </i>
                                Chỉnh sửa thông tin
                            </a>
                            <a id="deleteStaff" class="btn-remove dropdown-item" href="javascript:;" linkurl="'.route('staff.destroy',$staff->id).'">
                                <i class="la la-trash text-danger">
                                </i>
                                Xóa
                            </a>
                        </div>
                    </div>';

                })
                ->rawColumns(['status','description','action'])
                ->make(true);
        }
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
    	return response(['msg' => 'Xóa thành công!', 'status' => 'success']);
    }
}
