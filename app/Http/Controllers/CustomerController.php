<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerController extends Controller
{   

    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->getAll();
        return $customers;
    }

    public function show($id)
    {
        $customer = $this->customerRepository->getById($id);
        return $customer;
    }

    public function update($id)
    {
        $customer = $this->customerRepository->update($id);
        return redirect('/customer' . $id);
    }
}
