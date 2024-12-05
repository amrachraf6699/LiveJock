<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) && !empty($model->name)) {
                $model->slug = \Str::slug($model->name);
            }
        });
    }

    protected $guarded = [];


    public function getLogoUrlAttribute()
    {
        return asset('storage/' .  $this->attributes['logo']);
    }

}
