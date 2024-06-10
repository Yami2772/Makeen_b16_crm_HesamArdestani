<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'FirstName',
        'LastName',
        'MobileNumber',
        'Sex',
        'Password',
        'Email',
        'order_id',
        'team_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'Password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'Password' => 'hashed',
    ];

    // protected $appends = [
    //     "full_name"
    // ];

    // public function getFullNameAttribute()
    // {
    //     return "$this->FirstName $this->LastName";
    // }

    // protected function FullName(): Attribute
    // {
    //     return new Attribute(
    //         get: fn () => "$this->FirstName $this->LastName"
    //     );
    // }


    //Relations...
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }

    public function Labels()
    {
        return $this->morphToMany(Label::class, 'labelable');
    }

    public function Message(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function Task(): MorphToMany
    {
        return $this->morphToMany(Task::class, 'labelable');
    }

    public function Notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function Teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }
}
