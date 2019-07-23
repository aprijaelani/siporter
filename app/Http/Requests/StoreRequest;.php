<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nama' => 'required',
            'alamat'  => 'required',
            'telepon'  => 'required',
            'zipcode'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Tidak Boleh Kosong.',
            'alamat.required' => 'Alamat Tidak Boleh Kosong.',
            'telepon.required' => 'Nomor Telepon Tidak Boleh Kosong.',
            'zipcode.required' => 'Zipcode Tidak Boleh Kosong.'
        ];
    }
}
