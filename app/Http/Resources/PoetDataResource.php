<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoetDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'poet_id' => $this->poet_id,
            'language' => $this->language,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'description' => $this->description,
        ];
    }
}
