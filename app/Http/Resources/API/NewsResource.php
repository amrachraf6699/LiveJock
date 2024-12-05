<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover' => asset('storage/' . $this->cover),
            'is_important' => $this->is_important ? true : false,
            'published_at' => $this->created_at->format('Y-m-d H:i:s'),
            'content' => $this->when(Route::currentRouteName() === 'news.show', $this->content),
        ];
    }
}
