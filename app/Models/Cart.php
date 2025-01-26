<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'id_cart';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game');
    }
}
