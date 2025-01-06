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
        'genre',
        'price',
        'name',
        'rating',
        'icon',
        'banner',
        'screenshot_1',
        'screenshot_2',
        'screenshot_3',
        'screenshot_4'
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

    public function calculateRating($positiveReviews, $totalReviews)
    {
        if ($totalReviews === 0) {
            return 'No Reviews';
        }

        $positivePercentage = ($positiveReviews / $totalReviews) * 100;

        if ($totalReviews >= 500) {
            if ($positivePercentage >= 95) {
                return 'Overwhelmingly Positive';
            } elseif ($positivePercentage >= 80) {
                return 'Very Positive';
            }
        } elseif ($totalReviews >= 50) {
            if ($positivePercentage >= 80) {
                return 'Very Positive';
            } elseif ($positivePercentage >= 70) {
                return 'Mostly Positive';
            }
        } else { // 10-49 reviews
            if ($positivePercentage >= 80) {
                return 'Positive';
            } elseif ($positivePercentage >= 70) {
                return 'Mostly Positive';
            }
        }

        if ($positivePercentage >= 40) {
            return 'Mixed';
        } elseif ($positivePercentage >= 20) {
            return 'Mostly Negative';
        } elseif ($positivePercentage >= 5) {
            return 'Very Negative';
        }

        return 'Overwhelmingly Negative';
    }

}
