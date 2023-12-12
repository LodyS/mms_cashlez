<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokumenPersyaratanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'document_id'=>$this->id,
            'applicant_id'=>$this->id_download,
            'document'=>$this->label_photo ?? '',
            'photo_path'=>url($this->photo_path),
            'catatan'=>$this->catatan,
            'status'=>$this->status,
        ];
    }
}
