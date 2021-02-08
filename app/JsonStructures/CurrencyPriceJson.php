<?php

namespace App\JsonStructures;


use App\Helpers\Util;
use App\JsonStructures\Base\BaseJsonStructure;
use App\JsonStructures\Base\JsonDictionary;

class CurrencyPriceJson extends BaseJsonStructure
{

    protected $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function toArray()
    {
        $res = null;
        $currencyPrice = $this->options['currency_price'];

        if (!empty($currencyPrice)){
            $res = [
                JsonDictionary::NS_ID => $currencyPrice->getAttribute('id'),
                JsonDictionary::NS_PRICE => $currencyPrice->getAttribute('price'),
                JsonDictionary::NS_FROM_DATE => $currencyPrice->getAttribute('from_date'),
                JsonDictionary::NS_FROM_DATE_RAW => Util::i18n_date2($currencyPrice->getAttribute('from_date'), null, false, null, false, false, false, true),
                JsonDictionary::NS_TO_DATE => $currencyPrice->getAttribute('to_date'),
                JsonDictionary::NS_TO_DATE_RAW => Util::i18n_date2($currencyPrice->getAttribute('to_date'), null, false, null, false, false, false, true),
                JsonDictionary::NS_ENABLE => $currencyPrice->getAttribute('enable'),
            ];
        }

        return $res;
    }
}
