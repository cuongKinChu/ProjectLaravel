<?php

namespace App\Services;

use App\Repositories\CustomerRepositoryInterface;

class CustomerService
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomer()
    {
        return $this->customerRepository->getAll(['orders']);
    }

    public function insert($request)
    {
        $request->except('_token');
        $array = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ];
        return $this->customerRepository->create($array);
    }

    public function findById($customerId)
    {
        return $this->customerRepository->findById($customerId);
    }

    public function updateById($request, $customerId)
    {
        $request->except('_token');
        $array = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ];
        return $this->customerRepository->update($customerId, $array);
    }

    public function deleteById($customerId)
    {
        return $this->customerRepository->delete($customerId);
    }
}
