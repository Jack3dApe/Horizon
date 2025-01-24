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

    protected $primaryKey = 'id_game';

    protected $fillable = [
        'id_publisher',
        'genre',
        'price',
        'name',
        'rating',
        'release_date',
        'icon',
        'banner',
        'grid',
        'logo',
        'description_en',
        'description_pt'
        //'screenshot_1',
        //'screenshot_2',
        //'screenshot_3',
        //'screenshot_4'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'release_date' => 'date',
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


    public function getRatingPercentageAttribute()
    {
        $totalReviews = $this->reviews()->count();
        $positiveReviews = $this->reviews()->where('is_positive', true)->count();

        return $totalReviews > 0 ? round(($positiveReviews / $totalReviews) * 100) : 0;
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'description_' . $locale} ?? null;
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'id_game');
    }




}
