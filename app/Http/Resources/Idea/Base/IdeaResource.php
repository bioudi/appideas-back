<?php

namespace App\Http\Resources\Idea\Base;

use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'url' => $this->url,
            'type' => $this->type,
            'rating' => $this->rating,
            'price' => $this->price,
            'downloads' => $this->downloads,
            'upvotes' => $this->upvotes,
            'category' => $this->category,
        ];
    }
}
