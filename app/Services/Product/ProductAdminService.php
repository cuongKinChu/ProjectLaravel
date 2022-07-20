<?php

namespace App\Services\Product;

use App\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Session;

class ProductAdminService
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
        $request->except('_token');
        $array = [
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'image' => $request->input('file'),
            'description' => $request->input('description'),
        ];
        return $this->productRepository->create($array);
    }

    public function findById($productId)
    {
        return $this->productRepository->find($productId);
    }

    public function updateById($request, $productId)
    {
        $request->except('_token');
        $array = [
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'image' => $request->input('file'),
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