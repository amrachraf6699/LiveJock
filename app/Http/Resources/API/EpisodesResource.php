<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data =
        [
            'id' => $this->id,
            'title' => $this->title,
            'cover' => asset('storage/' . $this->cover),
            'video_url' => asset('storage/' . $this->video_url),
        ];

        return $data;
    }
}
