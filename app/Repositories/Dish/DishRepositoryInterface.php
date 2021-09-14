<?php

namespace App\Repositories\Dish;

use App\Repositories\RepositoryInterface;

interface DishRepositoryInterface extends RepositoryInterface
{
    function getModel();
}
