<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'poster', 'release_date', 'is_published'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where("title", "like", "%" . request('search'). "%")
            ->orWhere("description", "like", "%" . request('search'). "%");
        }
        if($filters['released-from'] ?? false) {
            $query->where("release_date", ">=", request('released-from'));
        }
        if($filters['released-until'] ?? false) {
            $query->where("release_date", "<=", request('released-until'));
        }
    }
}
