<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'purchases',
        'profile_pic',
        'role',
        'is_2fa_enabled',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_2fa_enabled' => 'boolean',
        ];
    }

    /**
     * Relationship: User has many orders.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'id_user');
    }

    /**
     * Relationship: User owns many games.
     */
    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'owns', 'id_user', 'id_game');
    }

    /**
     * Relationship: User has many reviews.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'id_user');
    }

    /**
     * Relationship: User has many support tickets.
     */
    public function supportTickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class, 'id_user');
    }
}
