<?php

namespace App\JsonStructures;


use App\JsonStructures\Base\BaseJsonStructure;
use App\JsonStructures\Base\JsonDictionary;

class UserJson extends BaseJsonStructure
{

    protected $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function toArray()
    {
        $res = [];
        $user = $this->options['user'];

        $res = [
            JsonDictionary::NS_ID => $user->getAttribute('id'),
            JsonDictionary::NS_NAME => $user->getAttribute('name'),
            JsonDictionary::NS_USERNAME => $user->getAttribute('username'),
            JsonDictionary::NS_EMAIL => $user->getAttribute('email'),
        ];

        return $res;
    }
}
