<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
        'name',
        'phone',
        'address'
    ];

    // ✅ USER RELATION
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ ORDER ITEMS
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}