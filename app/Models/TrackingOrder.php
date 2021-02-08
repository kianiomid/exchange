<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingOrder extends Model
{
    use HasFactory;

    const TABLE = 'tracking_orders';
    const USER_ID = 'user_id';
    const ORDER_ID = 'order_id';
    const TRACKING_CODE = 'tracking_code';
    const TRACKING_ORDER = 'tracking_order';

    protected $table = self::TABLE;

    protected $fillable = ["user_id", "order_id", "tracking_code", "created_at", "updated_at"];

    protected static $selectFields = ["id", "user_id", "order_id", "tracking_code", "created_at", "updated_at"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
