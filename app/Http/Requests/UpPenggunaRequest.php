<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpPenggunaRequest extends FormRequest
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
        $unique = Rule::unique('users')->ignore($this->pengguna); // Pengeculian Unique Saat Update

        return [
          'name' => ['required'],
          // 'role' => ['required'],
          'username' => ['nullable', $unique],
          'password' => ['nullable'],
        ];
    }
}
