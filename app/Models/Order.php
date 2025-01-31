<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_order';
    protected $fillable = ['id_user', 'total_price', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }

    public function payments()
    {
        return $this->hasOne(Payment::class, 'id_order');
    }
}
