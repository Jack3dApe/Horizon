<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_discount';

    protected $fillable = [
        'id_game',
        'discount_percentage',
        'fixed_discount',
        'start_date',
        'end_date',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game', 'id_game');
    }
}
