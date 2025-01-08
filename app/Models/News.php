<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCoverUrlAttribute()
    {
        $coverPath = $this->attributes['cover'];
    
        if (file_exists(public_path('storage/' . $coverPath))) {
            return asset('storage/' . $coverPath);
        }
    
        return "https://ui-avatars.com/api/?name=" . urlencode($this->title) . "&color=7F9CF5&background=EBF4FF";
    }
    
}
