<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateBrandRequest;
use App\Http\Services\BrandService;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.list',compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.add');
    }

    public function store(CreateBrandRequest $request)
    {
        $brand = new Brand();
        $this->brandService->add($request, $brand);
        return redirect()->route('brands.index')->with("addSuccess","Successfully Added");
    }

    public function edit($id)
    {
        $brand = $this->brandService->findByID($id);
        return view('admin.brands.edit',compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = $this->brandService->findByID($id);
        $this->brandService->update($request,$brand);
        return redirect()->route('brands.index')->with('updateSuccess','Successfully Updated');
    }

    public function destroy($id)
    {
        $brand = $this->brandService->findByID($id);
        $brand->delete();
        return redirect()->route('brands.index')->with('deleteSuccess','Successfully deleted');
    }
}
