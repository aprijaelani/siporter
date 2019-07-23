<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tid' => 'Required',
            'mid' => 'Required',
            'csi' => 'Required',
            'type_edc' => 'Required',
            'serial_number' => 'Required',
            'nama_merchant' => 'Required',
            'alamat_merchant' => 'Required',
            'pic_merchant' => 'Required',
            'telepon' => 'Required'
        ];
    }

    public function messages ()
    {
        return [
            'tid.required' => 'TID Tidak Boleh Kosong.',
            'mid.required' => 'MID Tidak Boleh Kosong.',
            'csi.required' => 'CSI Tidak Boleh Kosong.',
            'type_edc.required' => 'Type Edc Tidak Boleh Kosong.',
            'serial_number.required' => 'Serial Number Tidak Boleh Kosong.',
            'nama_merchant.required' => 'Nama Merchant Tidak Boleh Kosong.',
            'alamat_merchant.required' => 'Alamat Merchant Tidak Boleh Kosong.',
            'pic_merchant.required' => 'PIC Merchant Tidak Boleh Kosong.',
            'telephone.required' => 'Nomor Handtelephone Tidak Boleh Kosong.'
        ];
    }
}
