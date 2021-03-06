<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public function tags(Type $var = null)
    {
        # code...
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
