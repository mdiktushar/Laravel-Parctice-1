<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts(Type $var = null)
    {
        # code...
        return $this->morphByMany(Post::class, 'taggable');
    }
    public function videos(Type $var = null)
    {
        # code...
        return $this->morphByMany(Video::class, 'taggable');
    }
}
