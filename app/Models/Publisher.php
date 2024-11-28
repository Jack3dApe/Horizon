<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
    use HasFactory;

    protected $fillable = ['name', 'numOfGames', 'email', 'dateOfEstablishment'];
    protected $primaryKey = 'id_publisher';

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'id_publisher');
    }

}
