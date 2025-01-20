<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = ['id_user','id_game'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game');
    }
}
