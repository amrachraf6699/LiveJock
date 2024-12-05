<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeriesesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'id' => $this->slug,
            'name' => $this->name,
            'cover' => asset('storage/' . $this->cover),
            'episodes' => EpisodesResource::collection($this->whenLoaded('episodes')),
        ];
    }
}
