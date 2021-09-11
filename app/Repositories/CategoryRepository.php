<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository extends BaseRepository implements RepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }
}
