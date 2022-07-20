<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    //Lấy tất cả sản phẩm có phân trang mỗi trang 6sp
    public function getAll()
    {
        return $this->model->orderby('id', 'DESC')->paginate(6);
    }

    //Lấy thông tin 1 sản phẩm
    public function find($id)
    {
        return $this->model->newModelQuery()->findOrFail($id);
    }

    //Thêm sản phẩm
    public function create($request)
    {
        return $this->model->newModelQuery()->create($request);
    }

    //Cập nhật sản phẩm
    public function update($id, $request)
    {
        return $this->find($id)->update($request);
    }

    //Xoá sản phẩm
    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}