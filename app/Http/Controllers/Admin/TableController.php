<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Repositories\TableRepository;

class TableController extends Controller
{
    private $tableRepository;

    public function __construct(TableRepository $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }

    public function index()
    {
        $perPage = 6;
        $tables = $this->tableRepository->getAll(6);
        return view('admin.table.index', compact('tables'));
    }

    public function store(TableRequest $request)
    {
        $data = $request->except('_token');
        $this->tableRepository->create($data);
        return redirect(route('admin.table.index'));
    }

    public function edit($id)
    {
        $table = $this->tableRepository->find($id);
        return view('admin.table.edit', compact('table'));
    }
    public function update(TableRequest $request, $id)
    {
        $data = $request->except('_token');
        $this->tableRepository->update($id, $data);
        return redirect(route('admin.table.index'));
    }

    public function delete($id)
    {
        $this->tableRepository->delete($id);
        return redirect(route('admin.table.index'));
    }
}
