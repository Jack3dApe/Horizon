<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportTicket extends Model
{
    /** @use HasFactory<\Database\Factories\SupportTicketFactory> */
    use HasFactory;

    protected $fillable = [
        'id_user',
        'issue_description',
        'status',
        'creation_date',
        'resolution_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
