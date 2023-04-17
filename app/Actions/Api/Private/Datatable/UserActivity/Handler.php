<?php

namespace App\Actions\Api\Private\Datatable\UserActivity;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = \App\Models\UserActivity::query();

        return DataTables::of($query)->toJson();
    }
}
