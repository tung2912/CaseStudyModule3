<?php


namespace App\Http\Repositories;


use App\Models\Order;

class OrderRepository extends BaseRepository implements RepositoryInterface
{
    protected $orderModel;

    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->orderModel;
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->orderModel->findOrFail($id);
    }


}
