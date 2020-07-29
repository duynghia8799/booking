<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdate extends FormRequest
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
            'number_person' => 'numeric',
            'start_at' => 'required|max:191',
            'service' => 'required',
            'staff' => 'required',
            'note' => 'nullable|max:225',
        ];
    }

    public function messages() {
        return [
            'number_person.numeric' => 'Vui lòng chỉ nhập số',

            'start_at.required' => 'Vui lòng không để trống',
            'start_at.max' => 'Vui lòng không nhập quá 191 ký tự',

            'service.required' => 'Vui lòng chọn  ít nhất 1 dịch vụ',
            'staff.required' => 'Vui lòng chọn ít nhất 1 nhân viên',

            'note.max' =>  'Vui lòng không nhập quá 191 ký tự',

        ];
    }
}
