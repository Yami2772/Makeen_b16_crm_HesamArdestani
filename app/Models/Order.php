<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'OrdersName',
        'Number',
        'Seller',
        'TotalPrice'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Products()
    {
        return $this->hasMany(Product::class);
    }

    public function Factor()
    {
        return $this->hasOne(Factor::class);
    }
}
