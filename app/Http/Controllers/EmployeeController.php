<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeeLevel;
use App\Models\EmployeeDivision;
use App\DataTransferObjects\UserDto;
use App\DataTransferObjects\EmployeeDto;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('skote.pages.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->toArray();
        $users = User::where('active_status', 'yes')->pluck('name', 'id')->toArray();
        $employeeLevels = EmployeeLevel::where('active_status', 'yes')->pluck('name', 'id')->toArray();
        $employeeDivisions = EmployeeDivision::where('active_status', 'yes')->pluck('name', 'id')->toArray();
        $userDto = UserDto::fromModel(Auth::user());

        return view('skote.pages.employee.create', compact('employeeDivisions', 'employeeLevels', 'users', 'roles', 'userDto'));
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
        try {
            $employee = Employee::with(['user', 'employee_level', 'employee_position.employee_division'])->where('id', $id)->firstOrFail();
            $employeeDto = EmployeeDto::fromModel($employee);

            return view('skote.pages.employee.show', compact('employee', 'employeeDto'));
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
