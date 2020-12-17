<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserRepository extends BaseRepository implements RepositoryInterface
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->userModel;
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->userModel->findOrFail($id);
    }


}
