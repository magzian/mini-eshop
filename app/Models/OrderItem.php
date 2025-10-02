<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;



class OrderItem extends Model
{
    use HasFactory;

     protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'unit_price',
        'line_total',
    ];

    protected $casts = [
        'qty' => 'integer',
        'unit_price' => 'decimal:2',
        'line_total' => 'decimal:2',
    ];

    public function order(): BelongsTo        // An OrderItem belongs to one order
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo       // An OrderItem belongs to one product
    {
        return $this->belongsTo(Product::class);
    }
}
