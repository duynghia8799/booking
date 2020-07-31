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
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Vui lòng không để trống',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.max' => 'Vui lòng không nhập quá 191 ký tự',
        ];
    }
}
