<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'poster', 'release_date', 'is_published',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where("title", "like", "%" . request('search') . "%")
                ->orWhere("description", "like", "%" . request('search') . "%");
        }
        if ($filters['released-from'] ?? false) {
            $query->where("release_date", ">=", request('released-from'));
        }
        if ($filters['released-until'] ?? false) {
            $query->where("release_date", "<=", request('released-until'));
        }
    }

    /**
     * The Users that liked the Movies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Users::class);
    }
}
