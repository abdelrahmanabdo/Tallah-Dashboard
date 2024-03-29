<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
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
                    'meta_title' => $item->meta_title,
                    'meta_description' => $item->meta_description,
                    'slug' => $item->slug,
                    'title' => $item->title,
                    'title_ar' => $item->title_ar,
                    'body' => $item->body,
                    'body_ar' => $item->body_ar,
                    'likes' => $item->likes,
                    'hashtags' => $item->hashtags,
                    'comments_count' => $item->comments->count(),
                    'user' => $item->user,
                    'image' => $item->image,
                    'created_at' => $item->created_at
                ];
            }),
        ];
    }
}
