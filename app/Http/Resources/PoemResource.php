<?php

namespace App\Http\Resources;

use App\Models\PoetData;
use Illuminate\Http\Resources\Json\JsonResource;

class PoemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'language' => $this->language,
            'title' => $this->title,
            'created' => $this->created,
            'slug' => $this->slug,

            'poet' => new PoetResource($this->poet),
        ];
    }
}
