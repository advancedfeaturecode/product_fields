<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'fields' => $this->whenLoaded('fields', ProductFieldResource::collection($this->custom_fields)),
        ];
    }
}
