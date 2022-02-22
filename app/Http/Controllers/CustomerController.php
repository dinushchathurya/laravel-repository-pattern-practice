<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('active', 1)
        ->with('user')
        ->get()
        ->map(function ($customer) {
            return [
                'customer_id' => $customer->id,
                'name' => $customer->name,
                'created_by' => $customer->user->email,
                'updated_at' => $customer->updated_at->diffforhumans(),
            ];
        });

        return $customers;
    }
}