<?php


namespace App\Http\Services;


use App\Http\Repositories\OrderRepository;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class OrderService implements ServiceInterface
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->orderRepository->getAll();
    }

    function findByID($id) {
        return $this->orderRepository->findById($id);
    }

    function add($request, $obj = null)
    {
        // TODO: Implement add() method.
//        $obj->name = $request->name;
//        $obj->email = $request->email;
//        $obj->password = Hash::make($request->password);
//        $obj->role_id = $request->role_id;
//        $this->orderRepository->save($obj);
    }

    function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $obj = null)
    {
        // TODO: Implement update() method.
//        $obj->fillable($request->all());
//        $obj->name = $request->name;
//        $obj->email = $request->email;
//        $obj->role_id = $request->role_id;
//        $obj->save();
//        $this->userRepository->save($obj);
    }
}
