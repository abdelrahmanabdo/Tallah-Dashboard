<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StylistSpecializationCollection extends ResourceCollection
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
            'success' => true,  
            'data' => $this->collection->transform(function($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->specialization->title,
                    'description' => $item->description,
                ];
            }),
        ];
    }
}
