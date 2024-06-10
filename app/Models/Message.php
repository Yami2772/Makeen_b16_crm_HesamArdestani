<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'Description'
    ];

    /**
     * The Tickets that belong to the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }
}
