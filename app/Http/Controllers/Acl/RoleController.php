<?php

namespace App\Http\Controllers\Acl;

use App\DataTransferObjects\UserDto;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userDto = UserDto::fromModel(Auth::user());
        return view('skote.pages.acl.role.index', compact('userDto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userDto = UserDto::fromModel(Auth::user());
        return view('skote.pages.acl.role.create', compact('userDto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $role = Role::find($id);
            if (is_null($role))
                throw new \Exception('Role ID not found');

            $uninterruptibleRoles = config('pm.uninterruptible_roles');
            $role = Role::where('id', $id)->first();
            if (in_array($role->name, $uninterruptibleRoles))
                throw new \Exception($role->name.' is an uninterruptible role');

            $userDto = UserDto::fromModel(Auth::user());
            return view('skote.pages.acl.role.edit', compact('role', 'userDto'));
        } catch (\Exception $e) {
            return redirect()->route('acl.roles.index')->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function permissions(string $id)
    {
        try {
            $role = Role::where('id', $id)->firstOrFail();
            $userDto = UserDto::fromModel(Auth::user());
            return view('skote.pages.acl.role.permission', compact('role', 'userDto'));
        } catch (\Exception $e) {
            return redirect('acl.roles.index')->withErrors(['message' => $e->getMessage()]);
        }
    }
}
