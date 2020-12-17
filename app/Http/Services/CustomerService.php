<?php


namespace App\Http\Services;


use App\Http\Repositories\CustomerRepository;

class CustomerService implements ServiceInterface
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
    }

    function findByID($id)
    {
        // TODO: Implement findByID() method.
    }

    function add($request, $obj)
    {
        // TODO: Implement add() method.
    }

    function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $obj = null)
    {
        // TODO: Implement update() method.
    }

}
