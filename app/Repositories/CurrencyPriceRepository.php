<?php


namespace App\Repositories;


use App\Repositories\Base\Repository;
use Illuminate\Database\Eloquent\Model;

class CurrencyPriceRepository extends Repository
{

    protected $model;

    public function __construct(Model $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param $currencyPriceId
     * @return mixed
     */
    public function find($currencyPriceId)
    {
        $query = $this->model->findOrFail($currencyPriceId);

        return $query;
    }
}
