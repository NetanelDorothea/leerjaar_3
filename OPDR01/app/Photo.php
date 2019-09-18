<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['album_id', 'photo'];
    public function Album()
    {
        return $this->belongsTo(Album::class);
    }
}
