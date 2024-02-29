<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengirimanRequest extends FormRequest
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
            'pelanggan_id' => ['required'],
            'kendaraan_id' => ['required'],
            'no_pengiriman' => ['required', 'unique:pengirimen'],
            'tgl_pengiriman' => ['required', 'date'],
            'nama_penerima' => ['required'],
            'alamat_penerima' => ['required'],
            'nama_barang' => ['required'],
            'jumlah_barang' => ['required', 'numeric'],
            'biaya_kirim' => ['required', 'numeric'],
            'keterangan' => ['nullable'],
        ];
    }
}
