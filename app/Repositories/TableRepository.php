<?php

namespace App\Repositories;

use App\Models\Table;

class TableRepository extends BaseRepository implements RepositoryInterface
{
    public function getModel()
    {
        return Table::class;
    }

    public function getAll($paginate = 8)
    {
        return $this->model::orderBy('status')
            ->orderBy('updated_at', 'desc')
            ->paginate($paginate);
    }
}
