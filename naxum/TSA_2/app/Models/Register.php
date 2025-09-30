<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    /** @use HasFactory<\Database\Factories\RegisterFactory> */
    use HasFactory;

    protected $guarded = ['id'];
}
