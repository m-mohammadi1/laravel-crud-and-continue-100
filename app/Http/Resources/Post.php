<?php

namespace App\Http\Resources;



use App\Http\Resources\Comment as CommentResource;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
            'title' => $this->title,
            // 'comments' => CommentResource::collection($this->whenLoaded('comments'))
            'comments' => $this->when(
                $request->get('include') == 'comments',
                CommentResource::collection($this->comments)
            ),
        ];
    }
}
