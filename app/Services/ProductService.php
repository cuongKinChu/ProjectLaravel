<?php

namespace App\Services;

use App\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Session;

class ProductService
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProduct()
    {
        return $this->productRepository->getAll();
    }

    public function insert($request)
    {
        foreach ($request->product_name as $key=>$product_name)
        {
            $array = [
                'product_name' => $product_name,
                'price' => $request->price[$key],
                'description' => $request->description[$key],
            ];
            $this->productRepository->create($array);
        }
        return true;
    }

    public function findById($productId)
    {
        return $this->productRepository->findById($productId);
    }

    public function updateById($request, $productId)
    {
        $request->except('_token');
        $array = [
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ];
        return $this->productRepository->update($productId, $array);
    }

    public function deleteById($productId)
    {
        if ($this->productRepository->delete($productId)) {
            Session::flash('success', 'Delete product successful');
            return true;
        } else {
            Session::flash('error', 'Delete product error');
            return false;
        }
    }
}
