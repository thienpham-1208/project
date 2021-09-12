<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository implements RepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getAll()
    {
        return $this->model::orderBy('updated_at', 'desc')->get();
    }
}
