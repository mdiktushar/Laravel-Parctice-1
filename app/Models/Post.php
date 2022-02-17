<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function photos(Type $var = null)
    {
        # code...
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags(Type $var = null)
    {
        # code...
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
