<?php
namespace App\Services\Customer;

use App\Repositories\Eloquent\CustomerRepository;

class CustomerSevices
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function insert($request)
    {
        $request->except('_token');
        $password_h = bcrypt($request->password);
        $array = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => $password_h,
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ];
        return $this->customerRepository->create($array);
    }

}