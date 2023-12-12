<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MerchantRequest extends FormRequest
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
            'nama_merchant'=>'required|string',
            'pengajuan_sebagai'=>'required|string',
            'tahun_berdiri'=>'required|integer|digits:4',
            'jenis_usaha'=>'required|string',
            'mcc'=>'required|string',
            'fitur_transaksi'=>'required|string',
            'bisnis_email'=>'required|string',
            'bisnis_no_hp'=>'required|string',
            'alamat_bisnis'=>'required|string',
            'tempat_bisnis'=>'required|string',
            'store_url'=>'',
            'status_tempat_usaha'=>'required|string',
            'nama_pemilik_merchant'=>'required|string',
            'tempat_lahir'=>'required|string',
            'tanggal_lahir'=>'required',
            'alamat_sesuai_ktp'=>'required|string',
            'alamat_domisili'=>'',
            'kewarganegaraan'=>'',
            'email'=>'required|string',
            'nomor_identitas'=>'required|string',
            'nomor_hp'=>'required|string',
            'npwp'=>'',
            'nama_pengurus_merchant'=>'',
            'kewarganegaraan_pengurus'=>'',
            'nomor_identitas_pengurus'=>'',
            'npwp_pengurus'=>'',
            'email_pengurus'=>'',
            'nomor_hp_pengurus'=>'',
            'nama_bank'=>'required|string',
            'nomor_rekening_bank_penampung'=>'required|string',
            'nama_pemilik_rekening_merchant_badan_usaha'=>'required|string',
            'email_settlement'=>'required|string',
            'lat'=>'',
            'longitude'=>'',
            'jenis_produk'=>'required|string',
            'omset_rata_rata'=>'required|string',
            'alamat_pejabat_berwenang'=>'',
            'npwp_merchant_badan_usaha'=>'',
            'jenis_kelamin_pemilik'=>'required|string',
            'jenis_kelamin_pengurus'=>'required|string',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
