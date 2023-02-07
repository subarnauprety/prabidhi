<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class AboutUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "short_description" => $this->short_description,
            "members" => $this->members,
            "projects" => $this->projects,
            "clients" => $this->clients,
            'image' => $this->image ? URL::to("images/" . $this->image) : null,
        ];
    }
}
