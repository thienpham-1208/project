<?php

namespace App\Repositories\Dish;

use App\Models\Dish;
use App\Models\Category;
use App\Repositories\BaseRepository;

class DishRepository extends BaseRepository implements DishRepositoryInterface
{
    public function getModel()
    {
        return Dish::class;
    }

    public function getListDish($perPage = 5, $display = false)
    {
        $tblDish = $this->model->getTable();
        $tblCategory = with(new Category())->getTable();
        $dishes = $this->model::select("$tblDish.*", "$tblCategory.name as category_name")
            ->join("$tblCategory", "$tblCategory.id", '=', "$tblDish.category_id")
            ->orderBy('updated_at', 'desc');
        if ($display) {
            return $dishes->where("$tblDish.display", '=', $this->model::DISPLAY)
                ->paginate($perPage);
        }
        return $dishes->paginate($perPage);
    }
}
