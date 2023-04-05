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

        return DataTables::of($query)->toJson();
    }
}
