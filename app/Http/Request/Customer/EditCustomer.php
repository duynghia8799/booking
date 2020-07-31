<?php

namespace App\Http\Request\Customer;

use Illuminate\Foundation\Http\FormRequest;

class EditCustomer extends FormRequest
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
            'code' => 'nullable|string|max:191',
        ];
    }

    public function messages() {
        return [
            'code.max' => 'Vui lòng không nhập quá 191 ký tự',
        ];
    }
}
