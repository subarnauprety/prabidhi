<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class BlogResource extends JsonResource
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
            "id" => $this->id,
            "blog_type_id" => $this->blog_type_id,
            "title" => $this->title,
            "slug" => $this->slug,
            'image' => $this->image ? URL::to("images/" . $this->image) : null,
            "description" => $this->description,
            "content" => $this->blogContents
        ];
    }
}
