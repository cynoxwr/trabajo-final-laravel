<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    use HasFactory;

    public function bandaSonora()
    {
        return $this->hasMany('App\models\bandaSonora');
    }
}