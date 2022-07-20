<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        return $this->model->orderby('id', 'DESC')->paginate(5);
    }

    public function create($request)
    {
        $product = $this->model->newModelQuery();
         return $product->save();
    }

    public function findById($id)
    {
            $product = $this->productRepository->where('id', $id)->firstOrFail();
            return $product;
    }

    public function update($request,$id)
    {
        $request->except('_token');
        $product = $this->productRepository->find($id);
        $product->product_name = $request->product_name;
        $product->image = $request->file;
        $product->price = $request->price;
        $product->description = $request->description;
        return $product->save();
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        return $product->delete();

    }
}