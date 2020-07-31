<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;
use App\Http\Request\Setting\UpdateSetting;
class ConfigController extends Controller
{
    public function index()
    {
    	return view('admin.setting.edit');
    }

    public function store(UpdateSetting $request)
    {
    	$settings = Setting::all();
		foreach ($settings as $setting) {
    		$setting->email = $request->email;
    		$setting->save();
    	}
    	$request->session()->flash('success', 'Cập nhật thành công!');
        return redirect()->back();
    }
}
