<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class UserService implements ServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->userRepository->getAll();
    }

    function findByID($id) {
        return $this->userRepository->findById($id);
    }

    function add($request, $obj = null)
    {
        // TODO: Implement add() method.
        $obj->name = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->role_id = $request->role_id;
        $this->userRepository->save($obj);
    }

    function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $obj = null)
    {
        // TODO: Implement update() method.
//        $obj->fillable($request->all());
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->role_id = $request->role_id;
        $obj->save();
        $this->userRepository->save($obj);
    }
}
