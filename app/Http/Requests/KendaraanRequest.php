<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class KendaraanRequest extends FormRequest
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
        $unique = Rule::unique('kendaraans')->ignore($this->kendaraan); // Pengeculian Unique Saat Update

        return [
            'name' => ['required'],
            'supir_id' => ['required'],
            'no_polisi' => ['required', $unique],
            'no_mesin' => ['required'],
            'merk' => ['required'],
            'tahun' => ['required', 'digits:4'],
            'warna' => ['required'],
        ];
    }
}
