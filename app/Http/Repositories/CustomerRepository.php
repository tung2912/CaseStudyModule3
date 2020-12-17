<?php


namespace App\Http\Repositories;


use App\Models\Customer;

class CustomerRepository extends BaseRepository implements RepositoryInterface
{
    protected $customerModel;

    public function __construct(Customer $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->customerModel;
    }

    function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->customerModel->findOrFail($id);
    }

}
