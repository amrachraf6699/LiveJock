<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_verified' => $this->email_verified_at ? true : false,
            'verified_at' => $this->when($this->email_verified_at,$this->email_verified_at),
            'joined_at' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null,
        ];
    }

}
