<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    const TABLE = 'currencies';
    const DOLLAR = 'DOLLAR';

    protected $table = self::TABLE;

    protected $fillable = ["name", "descriptor", "sign", "enable", "created_at", "updated_at"];

    protected static $selectFields = ["id", "name", "descriptor", "sign", "enable", "created_at", "updated_at", "created_at", "updated_at"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currencyPrice()
    {
        return $this->belongsTo(CurrencyPrice::class, 'currency_price_id', 'id');
    }
}
