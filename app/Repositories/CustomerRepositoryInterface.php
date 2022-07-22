<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    //Tạo tài khoản
    public function create($request);

    // Lấy danh sách tài khoản
    public function getAll();
}