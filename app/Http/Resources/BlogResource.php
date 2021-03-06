<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'body' => $this->body,
                'hashtags' => $this->hashtags,
                'likes' => $this->likes,
                'user' => $this->user,
                'comments' => $this->comments,
                'images' => $this->images,
                'created_at' => $this->created_at
            ]
        ];
    }
}
