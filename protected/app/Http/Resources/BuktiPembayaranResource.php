<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BuktiPembayaranResource extends JsonResource
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
            'token_applicant'=>$this->token_applicant,
            'foto'=>url('protected/storage/bukti_pembayaran/'.$this->foto),
            'deskripsi'=>$this->deskripsi
        ];
    }
}
