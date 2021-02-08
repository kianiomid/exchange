<?php


namespace App\Repositories;


use App\Repositories\Base\Repository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository
{

    protected $model;

    public function __construct(Model $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        $query = $this->model->whereEmail($email)->firstOrFail();
        return $query;
    }
}
