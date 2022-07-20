<?php

namespace App\Services\Product;

use App\Repositories\ProductRepositoryInterface;

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
        return $this->productRepository->create($request);
    }

    public function findById($productId)
    {
        return $this->productRepository->findById($productId);
    }

    public function update($request,$productId)
    {
        return $this->productRepository->update($request,$productId);
    }

    public function deleteById($productId)
    {
        return $this->productRepository->delete($productId);
    }
}