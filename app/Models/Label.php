<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name'
    ];

    public function Users()
    {
        return $this->morphedByMany(User::class, 'labelable');
    }

    public function Products()
    {
        return $this->morphedByMany(Product::class, 'labelable');
    }

    public function Teams()
    {
        return $this->morphedByMany(Team::class, 'labelable');
    }
}
