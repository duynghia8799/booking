<?php

namespace App\Http\Request\Staff;

use Illuminate\Foundation\Http\FormRequest;

class AddStaff extends FormRequest
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
            'name' => 'required|string|max:191',
            'description' => 'nullable|string|max:225',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên nhân viên',
            'name.max' => 'Vui lòng không nhập quá 191 ký tự',

            'description.max' => 'Vui lòng không nhập quá 225 ký tự',
        ];
    }
}
