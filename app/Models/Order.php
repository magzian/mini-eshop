<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\OrderItem;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function user(): BelongsTo   // Each order is made by one user
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany   //Each order can have many items
    {
        return $this->hasMany(OrderItem::class);
    }
}
