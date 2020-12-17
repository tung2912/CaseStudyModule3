<?php


namespace App\Http\Repositories;

use App\Models\Product;


class ProductRepository extends BaseRepository implements RepositoryInterface
{
    protected $productModel;


    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->productModel->all();
    }

    function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->productModel->findOrFail($id);
    }

}
