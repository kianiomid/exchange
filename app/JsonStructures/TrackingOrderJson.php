<?php

namespace App\JsonStructures;


use App\Helpers\Util;
use App\JsonStructures\Base\BaseJsonStructure;
use App\JsonStructures\Base\JsonDictionary;

class TrackingOrderJson extends BaseJsonStructure
{

    protected $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function toArray()
    {

//        dd($this->options['tracking_order']);
        $res = null;
        $trackingCode = isset($this->options['tracking_code']) ? $this->options['tracking_code'] : null;
        $trackingOrder = isset($this->options['tracking_order']) ? $this->options['tracking_order'] : null;

        if (!empty($trackingCode)) {
            $res = [
                JsonDictionary::NS_TRACKING_CODE => $trackingCode,
            ];
        }

        if (!empty($trackingOrder)) {

            $user = (new UserJson([
                'user' => $trackingOrder->user
            ]))->toArray();


            $order = (new OrderJson([
                'order' => ($trackingOrder->order)
            ]))->toArray();

            $res[JsonDictionary::NS_TRACKING_ORDER] = [
                JsonDictionary::NS_ID => $trackingOrder->id,
                JsonDictionary::NS_USER => $user,
                JsonDictionary::NS_ORDER => $order,
            ];
        }

        return $res;
    }
}
