<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:100'],
            'password' => ['required', 'max:255', 'regex:/^\S*$/u'],
            'password_comfirm' => ['required_if:password,!null', 'same:password'],
            'address' => ['max:255'],
            'phone' => ['max:15, integer']
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'name' => 'Tên',
    //         'mail_address' => 'Địa chỉ email',
    //         'password' => 'Mật khẩu',
    //         'password_comfirm' => 'Mật khẩu xác nhận',
    //         'address' => 'Địa chỉ',
    //         'phone' => 'Số điện thoại'
    //     ];
    // }

    // public function messages ()
    // {
    //     return [
    //         'name.required' => ':attribute không được để trống',
    //         'name.max' => ':attribute không được nhiều hơn 255 kí tự',
    //         'mail_address.required' => ':attribute không được để trống',
    //         'mail_address.max' => ':attribute không được nhiều hơn 100 kí tự',
    //         'mail_address.unique' => ':attribute đã tồn tại',
    //         'mail_address.email' => ':attribute không phải kiểu email',
    //         'password.required' => ':attribute không được để trống',
    //         'password.max' => ':attribute không được nhiều hơn 255 kí tự',
    //         'password.regex' => ':attribute không được có khoảng trống',
    //         'password_comfirm.required_if' => ':attribute không được để trống',
    //         'password_comfirm.same' => ':attribute không giống mật khẩu',
    //         'address.max' => ':attribute không được quá 255 kí tự',
    //         'phone.size' => ':attribute không được quá 15 kí tự',
    //         'phone.integer' => ':attribute chỉ bao gồm các kí tự số'
    //     ];
    // }

}
