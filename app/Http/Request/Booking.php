<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class Booking extends FormRequest
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
            'fullname' => 'required|string|max:191',
            'phone' => 'required|numeric',
            'number_person' => 'numeric',
            'start_at' => 'required|max:191',
            'service' => 'required',
            'staff' => 'nullable',
            'note' => 'nullable|max:225',
        ];
    }

    public function messages() {
        return [
            'fullname.required' => 'Vui lòng không để trống',
            'fullname.string' => 'Vui lòng nhập đúng tên',
            'fullname.max' => 'Vui lòng không nhập quá 191 ký tự',

            'phone.required' => 'Vui lòng không để trống',
            'phone.numeric' => 'Vui lòng chỉ nhập số',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số điện thoại. VD: 0347956873',

            'number_person.numeric' => 'Vui lòng chỉ nhập số',

            'start_at.required' => 'Vui lòng không để trống',
            'start_at.max' => 'Vui lòng không nhập quá 191 ký tự',

            'service.required' => 'Vui lòng chọn  ít nhất 1 liệu trình',
            // 'staff.required' => 'Vui lòng chọn ít nhất 1 nhân viên',

            'note.max' =>  'Vui lòng không nhập quá 191 ký tự',

        ];
    }
}
