<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bandaSonora extends Model
{
    use HasFactory;

    public function pelicula()
    {
        return $this->belongsTo('App\models\pelicula');
    }
}