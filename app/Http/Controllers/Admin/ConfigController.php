<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;
use App\Http\Request\Setting\UpdateSetting;
class ConfigController extends Controller
{
    public function setting()
    {
        $inforWeb = Setting::get()->first();
    	return view('admin.setting.edit',compact('inforWeb'));
    }

    public function update(UpdateSetting $request, $id)
    {
        // dd($request->all());.
        $setting = Setting::findOrFail($id);
        $data = $request->except('_token');
    	$setting->update($data);
    	$request->session()->flash('success', 'Cập nhật thành công!');
        return redirect()->back();
    }
}
