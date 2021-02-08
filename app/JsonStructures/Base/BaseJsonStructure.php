<?php namespace App\JsonStructures\Base;


abstract class BaseJsonStructure
{
    protected $messages = [];
    protected $hasError = false;


    protected abstract function toArray();

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
