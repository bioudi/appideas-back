<?php

namespace App\Http\Resources\Idea\Base;

use App\Http\Resources\Idea\Base\IdeaResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IdeaResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ideas' => IdeaResource::collection($this->collection),
        ];
    }
}
