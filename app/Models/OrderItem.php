<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_order_item';
    protected $fillable = ['id_order', 'id_game', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game');
    }
}
