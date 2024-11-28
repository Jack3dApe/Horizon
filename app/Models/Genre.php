<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'genres';
    protected $primaryKey = 'id_genres';


    public function games(){
        return $this->hasMany(Game::class);

    }
}
