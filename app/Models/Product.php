<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable =
    [
        'ProductsName',
        'Price',
        'Inventory',
        'Seller',
        'image_path'
    ];

    public function Orders()
    {
        return $this->belongsTo(Order::class);
    }
}
