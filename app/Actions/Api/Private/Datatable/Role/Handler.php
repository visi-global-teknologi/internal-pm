<?php

namespace App\Actions\Api\Private\Datatable\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = Role::query();

        return DataTables::of($query)
        ->addColumn('column_action', function ($row) {
            $routeEdit = route('acl.roles.edit', ['role' => $row->id]);
            $routeDelete = route('api.private.acl.role.delete', ['id' => $row->id]);
            $routePermissions = route('acl.roles.permissions', ['role' => $row->id]);

            return view('skote.pages.acl.role.datatable.index.column_action', compact('routeEdit', 'routeDelete', 'routePermissions'))->render();
        })
        ->rawColumns(['column_action'])
        ->toJson();
    }
}
