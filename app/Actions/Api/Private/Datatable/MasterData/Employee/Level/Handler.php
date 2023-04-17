<?php

namespace App\Actions\Api\Private\Datatable\MasterData\Employee\Level;

use App\Models\EmployeeLevel as ModelEmployeeLevel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = ModelEmployeeLevel::query();

        return DataTables::of($query)
            ->addColumn('column_action', function ($row) {
                $routeEdit = route('master-data.employee.levels.edit', ['level' => $row->id]);
                $routeDelete = route('api.private.master-data.employee.level.delete', ['id' => $row->id]);

                return view('skote.pages.master-data.employee.level.datatable.index.column_action', compact('routeEdit', 'routeDelete'))->render();
            })
            ->rawColumns(['column_action'])
            ->toJson();
    }
}
