<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Game;


class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory, softDeletes;

    protected $primaryKey = 'id_review';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'id_game');
    }

    protected $fillable = [
        'id_user',
        'id_game',
        'is_positive',
        'description',
        'review_date',
    ];
}
