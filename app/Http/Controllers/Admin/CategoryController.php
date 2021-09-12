<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.category.index', compact('categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $data['name'] = $request->name;
        $data['slug'] = convertToSlug(strtolower($request->name));
        $this->categoryRepository->create($data);
        return redirect(route('admin.category.index'));
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(CreateCategoryRequest $request, $id)
    {
        $data = $request->only('name', 'slug');
        $this->categoryRepository->update($id, $data);
        return redirect(route('admin.category.index'));
    }

    public function delete($id)
    {
        $this->categoryRepository->delete($id);
        return redirect(route('admin.category.index'));
    }
}
