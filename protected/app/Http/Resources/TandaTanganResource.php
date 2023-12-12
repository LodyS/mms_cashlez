<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TandaTanganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->id,
            'file'=>url('protected/storage/tanda_tangan/'.$this->file),
            'token_applicant'=>$this->token_applicant
        ];
    }
}
