<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    // Lấy tất cả product
    public function getAll();

    //Thêm product
    public function create($request);

    //Hiển thị thông tin product
    public function findById($id);

    //Sửa product
    public function update($request,$id);

    //Xoá product
    public function delete($id);

}