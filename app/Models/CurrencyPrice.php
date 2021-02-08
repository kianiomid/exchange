<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyPrice extends Model
{
    use HasFactory;
    const TABLE = 'currency_prices';

    protected $table = self::TABLE;

    protected $fillable = ["price", "from_date", "to_date", "enable", "created_at", "updated_at"];

    protected static $selectFields = ["id", "price", "from_date", "to_date", "enable", "created_at", "updated_at", "created_at", "updated_at"];

}
