<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.list',compact('customers'));
    }

    public function show($id) {
        $customer = $this->customerService->findByID($id);
        return view('admin.customers.details',compact('customer'));
    }
}
