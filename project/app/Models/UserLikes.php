<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikes extends Model
{
    use HasFactory;

    protected $fillable = ['image_url', 'is_like', 'user_id'];
}
