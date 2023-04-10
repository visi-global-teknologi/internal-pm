<?php

namespace App\Actions\Api\Private\Datatable\Employee;

use App\Models\Employee as ModelEmployee;
use Illuminate\Http\Request;
use Storage;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = ModelEmployee::query()->with(['user', 'employee_level', 'employee_position.employee_division']);

        return DataTables::of($query)
            ->addColumn('join_date_formatted', function ($row) {
                return (! is_null($row->join_date)) ? $row->join_date->toFormattedDateString() : null;
            })
            ->addColumn('photo_url', function ($row) {
                $photoUrl = (! is_null($row->photo)) ?
                Storage::disk('employee-photo')->url($row->photo) :
                asset('/build/images/users/avatar-1.jpg');

                return view('skote.pages.employee.datatable.index.column_photo', compact('photoUrl'));
            })
            ->rawColumns(['photo_url'])
            ->toJson();
    }
}
