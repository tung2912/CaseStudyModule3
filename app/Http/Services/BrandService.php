<?php


namespace App\Http\Services;


use App\Http\Repositories\BrandRepository;

class BrandService implements ServiceInterface
{

    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->brandRepository->getAll();
    }

    function findByID($id)
    {
        // TODO: Implement findByID() method.
        return $this->brandRepository->findById($id);
    }

    function add($request, $obj=null)
    {
        // TODO: Implement add() method.
        $obj->name = $request->brandName;
        $obj->image = $request->image;
        $this->brandRepository->save($obj);

    }

    function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $obj = null)
    {
        // TODO: Implement update() method.
        $obj->name = $request->brandName;
        $this->brandRepository->save($obj);
    }
}
