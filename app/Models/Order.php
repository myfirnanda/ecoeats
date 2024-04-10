<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The users that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'orders', 'order_id', 'user_id');
    }

    /**
     * Get the shipping_detail associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shipping_detail(): HasOne
    {
        return $this->hasOne(ShippingDetail::class, 'order_id', 'id');
    }

    /**
     * Get the recipient_detail associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recipient_detail(): HasOne
    {
        return $this->hasOne(RecipientDetail::class, 'order_id', 'id');
    }
}
