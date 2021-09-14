<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Services\UploadService;
use App\Http\Requests\DishRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\Dish\DishRepository;

class DishController extends Controller
{
    private $dishRepository;
    private $categoryRepository;
    private $uploadService;

    public function __construct(DishRepository $dishRepository, CategoryRepository $categoryRepository, UploadService $uploadService)
    {
        $this->dishRepository = $dishRepository;
        $this->categoryRepository = $categoryRepository;
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        $perPage = 5;
        $dishes = $this->dishRepository->getListDish($perPage);
        return view('admin.dish.index', compact('dishes', 'perPage'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.dish.create', compact('categories'));
    }
    public function store(DishRequest $request)
    {
        $data = $request->except('_token', 'image');
        $file = $request->image;
        $data['slug'] = convertToSlug($request->name);
        $data['image'] = $this->uploadService->upload($file);
        $this->dishRepository->create($data);
        return redirect(route('admin.dish.index'));
    }

    public function edit($id)
    {
        $dish = $this->dishRepository->find($id);
        $categories = $this->categoryRepository->getAll();
        return view('admin.dish.edit', compact('dish', 'categories'));
    }

    public function update(DishRequest $request, $id)
    {
        $data = $request->except('_token', 'image');
        $data['slug'] = convertToSlug($request->name);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $data['image'] = $this->uploadService->upload($file);
        }
        $this->dishRepository->update($id, $data);
        return redirect(route('admin.dish.index'));
    }

    public function delete($id)
    {
        $this->dishRepository->delete($id);
        return redirect(route('admin.dish.index'));
    }

    public function updateDisplay($id)
    {
        $dish = $this->dishRepository->find($id);
        if ($dish->display) {
            $dish->display = Dish::NO_DISPLAY;
        } else {
            $dish->display = Dish::DISPLAY;
        }
        return $dish->save();
    }
}
