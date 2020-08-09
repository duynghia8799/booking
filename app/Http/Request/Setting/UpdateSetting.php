<?php

namespace App\Http\Request\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetting extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:191',
            'hotline' => 'required|numeric',
            'address' => 'required|max:191',
            'time_open' => 'required|max:191',
            'google_map' => 'required',
            'link_fb' => 'required|max:191',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Vui lòng không để trống',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.max' => 'Vui lòng không nhập quá 191 ký tự',

            'hotline.required' => 'Vui lòng không bỏ trống',
            'hotline.numeric' => 'Vui lòng chỉ nhập số',

            'address.required' => 'Vui lòng không bỏ trống',
            'address.max' => 'Vui lòng không nhập quá 191 ký tự',

            'time_open.required' => 'Vui lòng không bỏ trống',
            'time_open.max' => 'Vui lòng không nhập quá 191 ký tự',

            'google_map.required' => 'Vui lòng không bỏ trống',

            'link_fb.max' => 'Vui lòng không nhập quá 191 ký tự',
            'link_fb.required' => 'Vui lòng không bỏ trống',
        ];
    }
}
