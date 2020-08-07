<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Service;

use App\Http\Request\Service\AddService;
use App\Http\Request\Service\EditService;
use Yajra\Datatables\Datatables;
class ServiceController extends Controller
{
    public function index()
    {
    	
        $status = 
        [
            '1' => 'Đang hoạt động',
            '0' => 'Đã tạm dừng'
        ];
    	return view('admin.service.index',compact('status'));
    }

    public function datatables(Request $request)
    {  
        if(request()->ajax()) {
            if ($request->get('searchByStatus') != null) {
                $status = $request->get('searchByStatus');
                $services = Service::where('status',$status)->get();
            } else {
                 $services = Service::all();
            }
            return Datatables::of($services)
                ->editColumn('description', function ($service) {
                    if ($service->description == null) {
                        return 'Không có ghi chú!';
                    } else {
                        return $service->description;
                    }
                })
               ->editColumn('status', function ($service) {
                    if ($service->status == config('common.status.active')) {
                        return '<span class="text-success">Đang hoạt động</span>';
                    } else {
                        return '<span class="text-danger">Đã tạm dừng</span>';
                    }
                })
                ->addColumn('action', function ($service) {
                    return  
                    '<div class="dropdown">
                        <span aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
                            <i class="flaticon-folder">
                            </i>
                        </span>
                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -125px, 0px);" x-placement="top-start">
                            <a class="dropdown-item" href="'.route('service.edit',$service->id).'">
                                <i class="la la-edit text-success">
                                </i>
                                Chỉnh sửa thông tin
                            </a>
                            <a id="deleteService" class="btn-remove dropdown-item" href="javascript:;" linkurl="'.route('service.destroy',$service->id).'">
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
    	return response(['msg' => 'Xóa thành công!', 'status' => 'success']);
    }
}
