<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'model_id', 'action', 'changes', 'user_id', 'user_name', 'associated_name'];
}
