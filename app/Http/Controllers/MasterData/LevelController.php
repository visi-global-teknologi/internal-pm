<?php

namespace App\Http\Controllers\MasterData;

use App\DataTransferObjects\UserDto;
use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use Auth;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userDto = UserDto::fromModel(Auth::user());

        return view('skote.pages.master-data.employee.level.index', compact('userDto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userDto = UserDto::fromModel(Auth::user());

        return view('skote.pages.master-data.employee.level.create', compact('userDto'));
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
            $employeeLevel = EmployeeLevel::where('id', $id)->firstOrFail();
            $userDto = UserDto::fromModel(Auth::user());

            return view('skote.pages.master-data.employee.level.edit', compact('employeeLevel', 'userDto'));
        } catch (\Exception $e) {
            return redirect()->route('master-data.employee.levels.index')->withErrors(['message' => $e->getMessage()]);
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
}
