<?php

namespace App\Models;

use App\Models\Trait\CommissionTrait;
use App\Models\Trait\PriceTotalTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use CommissionTrait, HasFactory,  PriceTotalTrait;

    protected $fillable = [
        'id',
        'invoice_number',
        'purchaser_id',
        'order_date',
    ];

    public function purchaser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
