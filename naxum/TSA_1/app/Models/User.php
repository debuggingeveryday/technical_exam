<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'username',
        'referred_by',
        'enrolled_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userCategory(): HasOne
    {
        return $this->hasOne(UserCategory::class);
    }

    public function distributor(): HasOne
    {
        return $this->hasOne(User::class, 'referred_by');
    }

    public function referredBy(): HasMany
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'purchaser_id');
    }

    public function purchaser(): HasMany
    {
        return $this->hasMany(User::class, 'id');
    }
}
