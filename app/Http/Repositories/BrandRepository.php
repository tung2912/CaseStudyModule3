<?php


namespace App\Http\Repositories;


use App\Models\Brand;

class BrandRepository extends BaseRepository implements RepositoryInterface
{
    protected $brandModel;

    public function __construct(Brand $brandModel)
    {
        $this->brandModel = $brandModel;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->brandModel;
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->brandModel->findOrFail($id);
    }
}
