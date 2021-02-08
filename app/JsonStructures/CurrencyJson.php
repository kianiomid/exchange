<?php

namespace App\JsonStructures;


use App\JsonStructures\Base\BaseJsonStructure;
use App\JsonStructures\Base\JsonDictionary;

class CurrencyJson extends BaseJsonStructure
{

    protected $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function toArray()
    {
        $res = [];

        foreach ($this->options as $currency) {

            $currencyPrice = (new CurrencyPriceJson([
                'currency_price' => ($currency->currencyPrice)
            ]))->toArray();

            $res[JsonDictionary::NS_CURRENCY][] = [
                JsonDictionary::NS_ID => $currency->getAttribute('id'),
                JsonDictionary::NS_NAME => $currency->getAttribute('name'),
                JsonDictionary::NS_DESCRIPTOR => $currency->getAttribute('descriptor'),
                JsonDictionary::NS_SIGN => $currency->getAttribute('sign'),
                JsonDictionary::NS_ENABLE => $currency->getAttribute('enable'),
                JsonDictionary::NS_CURRENCY_PRICE => $currencyPrice
            ];
        }

        return $res;
    }
}
