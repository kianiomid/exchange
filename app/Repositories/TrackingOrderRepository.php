<?php


namespace App\Repositories;


use App\Repositories\Base\Repository;
use Illuminate\Database\Eloquent\Model;

class TrackingOrderRepository extends Repository
{

    protected $model;

    public function __construct(Model $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param $trackingCode
     * @return mixed
     */
    public function findByTrackingCode($trackingCode)
    {
        $query = $this->model->whereTrackingCode($trackingCode)
            ->first();

        return $query;
    }
}
