<?php


namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductService implements ServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->productRepository->getAll();
    }

    function findByID($id)
    {
        // TODO: Implement findByID() method.
        return $this->productRepository->findById($id);
    }

    function add($request, $obj)
    {
        // TODO: Implement add() method.
        $obj->name = $request->productName;
        $obj->price = $request->price;
        $obj->description = $request->description;
        $obj->views = $request->views;
        $obj->instock = $request->instock;
        $obj->sold = $request->sold;
        $obj->category_id = $request->category_id;
        $obj->brand_id = $request->brand_id;
        $this->uploadImage1($obj,$request);
        $this->uploadImage2($obj,$request);
        $this->productRepository->save($obj);
    }

    function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $obj = null)
    {
        // TODO: Implement update() method.
        $obj->name = $request->productName;
        $obj->price = $request->price;
        $obj->description = $request->description;
        $obj->views = $request->views;
        $obj->instock = $request->instock;
        $obj->sold = $request->sold;
        $obj->category_id = $request->category_id;
        $obj->brand_id = $request->brand_id;
        $this->uploadImage1($obj,$request);
        $this->uploadImage2($obj,$request);
        $this->productRepository->save($obj);

    }
    function uploadImage1($obj, $request){
        if ($request->hasFile('image1')) {
//            $pathImage = $request->file('image1')->store('public/images');

            $pathImage = Storage::disk('s3')->put('images', $request->image1, 'public');

            $obj->image1 = "https://tungnguyenc3.s3.amazonaws.com/".$pathImage;
        }
    }
    function uploadImage2($obj, $request){
        if ($request->hasFile('image2')) {
            $pathImage = Storage::disk('s3')->put('images', $request->image2, 'public');
            $obj->image2 = "https://tungnguyenc3.s3.amazonaws.com/".$pathImage;
        }
    }

}
