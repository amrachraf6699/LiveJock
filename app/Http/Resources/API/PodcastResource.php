<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\JsonResource;

class PodcastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->slug,
            'name' => $this->name,
            'cover' => asset('storage/' . $this->cover),
            'episodes' => $this->whenLoaded('episodes', function () {
                $episodes = $this->episodes;
                if ($episodes instanceof LengthAwarePaginator) {
                    return [
                        'data' => EpisodesResource::collection($episodes),
                        'pagination' => [
                            'total' => $episodes->total(),
                            'from' => $episodes->firstItem(),
                            'to' => $episodes->lastItem(),
                            'next_page' => $episodes->nextPageUrl(),
                            'prev_page' => $episodes->previousPageUrl(),
                            'first_page' => $episodes->url(1),
                            'last_page' => $episodes->url($episodes->lastPage())
                        ],
                    ];
                }

                return EpisodesResource::collection($episodes);
            }),
        ];
    }
}
