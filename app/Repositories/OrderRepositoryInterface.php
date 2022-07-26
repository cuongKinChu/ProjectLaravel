<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    //Retrieve orders from date ... to date ...
    public function getListOrderByDate($date_from, $date_to);

    //Get order by product name
    public function searchOrderHaveProductName($key);
}
