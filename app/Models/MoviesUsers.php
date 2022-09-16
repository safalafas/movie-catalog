<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviesUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id', 'movies_id',
    ];
}
