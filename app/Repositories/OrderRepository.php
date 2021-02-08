<?php


namespace App\Repositories;


use App\Repositories\Base\Repository;
use Illuminate\Database\Eloquent\Model;

class OrderRepository extends Repository
{

    protected $model;

    public function __construct(Model $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
