<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;

    protected $fillable = [
        'TotalPrice',
        'Warranty',
        'Warranry_starts_at',
        'Warranry_ends_at',
    ];

    public function Order()
    {
        return $this->hasOne(Order::class);
    }
}
