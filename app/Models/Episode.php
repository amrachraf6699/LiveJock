<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($episode) {
            if (empty($episode->id)) {
                $episode->id = (string) Str::uuid();
            }
        });
    }

    public function episodeable()
    {
        return $this->morphTo();
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
