<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'title'=>$this->title,
            'images'=>url('protected/storage/banner/'.$this->images),
            'description'=>$this->description
        ];
    }
}
