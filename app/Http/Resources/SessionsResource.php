<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionsResource extends JsonResource
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
            'logged_in_at' => $this->created_at->format('m/d/Y h:i:s'),
            'logged_in_at_humanly' => $this->created_at->diffForHumans(),
            'is_used' => $this->used_at ? true : false,
        ];

        $this->used_at ? $data['used_at'] = $this->used_at->format('m/d/Y h:i:s') : null;
        $this->used_at ? $data['used_at_humanly'] = $this->used_at->diffForHumans() : null;

        return $data;
    }
}
