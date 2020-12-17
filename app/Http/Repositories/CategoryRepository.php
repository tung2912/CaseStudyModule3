<?php


namespace App\Http\Repositories;


use App\Models\Category;

class CategoryRepository extends BaseRepository implements RepositoryInterface
{
    protected $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->categoryModel;
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->categoryModel->findOrFail($id);
    }
}
