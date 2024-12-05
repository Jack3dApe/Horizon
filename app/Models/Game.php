<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_publisher',
        'category',
        'price',
        'name',
        'rating',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Relationship: Game belongs to a publisher.
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class, 'id_publisher');
    }

    /**
     * Relationship: Game is owned by many users.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'games_users', 'id_game', 'id_user');
    }

    /**
     * Relationship: Game has many reviews.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'id_game');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'games_genres', 'id_game', 'id_genre');
    }
}
