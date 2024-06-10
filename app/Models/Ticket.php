<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;


    protected $fillable = [
        'Subject',
        'Supporter',
        'DateTime',
        'Status'
    ];

    public function Messages() : HasMany
    {
        return $this->hasMany(Message::class);
    }
}
