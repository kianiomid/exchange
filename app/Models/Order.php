<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const TABLE = 'orders';
    const SOURCE_CURRENCY = 'source_currency';
    const DESTINATION_CURRENCY = 'destination_currency';
    const PRICE_SOURCE_CURRENCY = 'price_source_currency';

    protected $table = self::TABLE;

    protected $fillable = ["source_currency", "destination_currency", "price_source_currency", "created_at", "updated_at"];

    protected static $selectFields = ["id", "source_currency", "destination_currency", "price_source_currency", "created_at", "updated_at"];
}
