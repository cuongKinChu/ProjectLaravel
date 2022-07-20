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

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    //Tìm kiếm
    public function find($id)
    {
        return $this->model->newModelQuery()->find($id);
    }

    //Thêm
    public function create(array $attributes)
    {
        return $this->model->newModelQuery()->create($attributes);
    }

    //Sửa
    public function update($id, array $attributes)
    {
        return $this->find($id)->update($attributes);
    }

    //Xoá
    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}