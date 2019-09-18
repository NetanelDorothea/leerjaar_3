<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{

    protected $fillable = ['name', 'cover_image'];
    public function Photo(){
        return $this->hasMany(Photo::class);
    }
}
