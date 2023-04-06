<?php

namespace App\Actions\Api\Private\Datatable\EmployeeDivision;

use App\Models\EmployeeDivision as ModelEmployeeDivision;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = ModelEmployeeDivision::query();

        return DataTables::of($query)
            ->addColumn('column_action', function ($row) {
                $routeEdit = route('master-data.employee-divisions.edit', ['employee_division' => $row->id]);
                $routeDelete = route('api.private.master-data.employee-division.delete', ['id' => $row->id]);

                return view('skote.pages.master-data.employee-division.datatable.index.column_action', compact('routeEdit', 'routeDelete'))->render();
            })
            ->rawColumns(['column_action'])
            ->toJson();
    }
}
