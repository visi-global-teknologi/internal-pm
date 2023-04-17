<?php

namespace App\Actions\Api\Private\Datatable\Employee;

use App\DataTransferObjects\EmployeeDto;
use App\Models\Employee as ModelEmployee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = ModelEmployee::query()->with(['user', 'employee_level', 'employee_position.employee_division']);

        return DataTables::of($query)
            ->addColumn('join_date_formatted', function ($row) {
                $employeeDto = EmployeeDto::fromModel($row);

                return $employeeDto->join_date_formatted;
            })
            ->addColumn('photo_url', function ($row) {
                $employeeDto = EmployeeDto::fromModel($row);
                $photoUrl = $employeeDto->url_photo;

                return view('skote.pages.employee.datatable.index.column_photo', compact('photoUrl'));
            })
            ->addColumn('column_action', function ($row) {
                $routeShow = route('employees.show', ['employee' => $row->id]);
                $routeEdit = route('employees.edit', ['employee' => $row->id]);
                $routeDelete = route('api.private.employee.delete', ['id' => $row->id]);

                return view('skote.pages.employee.datatable.index.column_action', compact('routeShow', 'routeEdit', 'routeDelete'))->render();
            })
            ->rawColumns(['photo_url', 'column_action'])
            ->toJson();
    }
}
