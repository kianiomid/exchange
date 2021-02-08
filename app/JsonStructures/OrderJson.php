<?php

namespace App\JsonStructures;


use App\Helpers\Util;
use App\JsonStructures\Base\BaseJsonStructure;
use App\JsonStructures\Base\JsonDictionary;

class OrderJson extends BaseJsonStructure
{

    protected $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function toArray()
    {
        $res = null;
        $order = $this->options['order'];

        if (!empty($order)){
            $res = [
                JsonDictionary::NS_ID => $order->getAttribute('id'),
                JsonDictionary::NS_SOURCE_CURRENCY => $order->getAttribute('source_currency'),
                JsonDictionary::NS_DESTINATION_CURRENCY => $order->getAttribute('destination_currency'),
                JsonDictionary::NS_PRICE_SOURCE_CURRENCY => $order->getAttribute('price_source_currency'),
            ];
        }

        return $res;
    }
}
