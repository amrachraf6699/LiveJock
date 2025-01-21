<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['cover_url'];



    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) && !empty($model->name)) {
                $model->slug = \Str::slug($model->name);
            }
        });
    }

    public function getCoverUrlAttribute()
    {
        return asset('storage/' .  $this->attributes['cover']);
    }

    public function episodes()
    {
        return $this->morphMany(Episode::class, 'episodeable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

}
