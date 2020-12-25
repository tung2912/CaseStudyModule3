<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        $this->categoryService->add($request, $category);
        return redirect()->route('categories.index')->with("addSuccess","Successfully Added");
    }

    public function edit($id)
    {
        $category = $this->categoryService->findByID($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CreateCategoryRequest $request, $id)
    {
        $category = $this->categoryService->findByID($id);
        $this->categoryService->update($request,$category);
        return redirect()->route('categories.index')->with('updateSuccess','Successfully Updated');
    }

    public function destroy($id)
    {
        $category = $this->categoryService->findByID($id);
        $category->delete();
        return redirect()->route('categories.index')->with('deleteSuccess','Successfully deleted');
    }
}
