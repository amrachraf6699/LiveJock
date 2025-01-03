<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Str;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        $data =
        [
            'id' => $this->id,
            'image' => $this->data['image'],
            'title' => $this->data['title'],
            'description' => $request->routeIs('notification') ? $this->data['description'] : Str::limit($this->data['description'], 50),
            'created_at' => $this->created_at->format('m/d/Y h:i:s'),
            'created_at_humanly' => $this->created_at->diffForHumans(),
            'is_read' => $this->read_at ? true : false,
            'resource_id' => $this->when($request->routeIs('notification') , $this->data['data']['id']),
            'resource_type' => $this->when($request->routeIs('notification') , $this->data['data']['type']),
        ];

        $this->read_at ? $data['read_at'] = $this->read_at->format('m/d/Y h:i:s') : null;
        $this->read_at ? $data['read_at_humanly'] = $this->read_at->diffForHumans() : null;

        return $data;
    }
}
