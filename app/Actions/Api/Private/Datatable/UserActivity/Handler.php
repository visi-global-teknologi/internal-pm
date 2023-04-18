<?php

namespace App\Actions\Api\Private\Datatable\UserActivity;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = \App\Models\UserActivity::query()->with(['user']);

        return DataTables::of($query)
            ->addColumn('date_time_formatted', function ($row) {
                return $row->date_time->toFormattedDateString();
            })
            ->addColumn('user_name', function ($row) {
                return (is_numeric($row->user_id)) ? $row->user->name : null;
            })
            ->toJson();
    }
}
