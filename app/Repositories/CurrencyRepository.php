<?php


namespace App\Repositories;


use App\Repositories\Base\Repository;
use Illuminate\Database\Eloquent\Model;

class CurrencyRepository extends Repository
{

    protected $model;

    public function __construct(Model $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
