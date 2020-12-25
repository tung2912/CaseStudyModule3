<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryRepository;

class CategoryService implements ServiceInterface
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->categoryRepository->getAll();
    }

    function findByID($id)
    {
        // TODO: Implement findByID() method.
        return $this->categoryRepository->findById($id);
    }

    function add($request, $obj=null)
    {
        // TODO: Implement add() method.
        $obj->name = $request->categoryName;
        $obj->image = $request->categoryImage;
        $obj->description = $request->description;
        $this->categoryRepository->save($obj);

    }

    function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $obj = null)
    {
        // TODO: Implement update() method.
        $obj->name = $request->categoryName;
        $obj->image = $request->categoryImage;
        $obj->description = $request->description;
        $this->categoryRepository->save($obj);
    }
}
