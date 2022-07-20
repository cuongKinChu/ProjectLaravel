<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRespositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }


    public function findById($id)
    {
        return $this->model->newModelQuery()->find($id);
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request, $id)
    {

    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }


}