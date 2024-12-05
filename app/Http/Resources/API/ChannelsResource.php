<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChannelsResource extends JsonResource
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
            'id' => $this->slug,
            'name' => $this->name,
            'logo' => asset('storage/' . $this->logo),
        ];

        if ($request->routeIs('channels.show'))
        {
            $data['live_url'] = $this->live_url;
        }

        return $data;
    }
}
