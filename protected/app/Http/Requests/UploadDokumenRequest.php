<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Models\DokumenApplicantDetail;
use App\Models\DokumenApplicant;

class UploadDokumenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'photo_path_nasabah'=>'required|mimes:png,jpg,jpeg',
            'applicant_id'=>'required|exists:data_merchants,id',
            'document_id'=>'required|exists:t_document_applicant,id'
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
