<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MerchantBranchRequest extends FormRequest
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
            'alamat'=>'required|string',
            'kebutuhan_edc'=>'required|numeric|min:1',
            'token_applicant'=>'required|string',
            'alamat_pengiriman'=>'required|string',
            'nama_pic'=>'string',
            'no_tlp_pic'=>'numeric',
            'user_id'=>'string|required',
            'tipe'=>'string',
            'nomor_seri'=>'string',
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
