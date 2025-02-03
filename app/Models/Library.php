<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'libraries';  // Nome da tabela

    protected $primaryKey = 'id_library';  // Chave primária personalizada

    protected $fillable = [
        'id_user',
        'id_game',
        'id_order',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
