<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function books(Type $var = null)
    {
        # code...
        return $this->hasManyThrough('App\Models\Book', 'App\Models\User');
    }
}
