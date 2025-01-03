<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return
        [
            'id' => $this->slug,
            'name' => $this->name,
            'cover' => asset('storage/' . $this->cover),
            'video_url' => asset('storage/' . $this->file->video_url)
        ];
    }
}
