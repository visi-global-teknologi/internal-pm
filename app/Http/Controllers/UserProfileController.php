<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\EmployeeDto;
use App\Models\Employee;
use Auth;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $employee = Employee::with(['user', 'employee_level', 'employee_position.employee_division', 'employee_addresses'])->where('user_id', Auth::user()->id)->first();
        $employeeDto = EmployeeDto::fromModel($employee);

        return view('skote.pages.user-profile', compact('employee', 'employeeDto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $employee = Employee::with(['user', 'employee_level', 'employee_position.employee_division', 'employee_addresses'])->where('user_id', $id)->firstOrFail();
            $employeeDto = EmployeeDto::fromModel($employee);

            return view('skote.pages.user-profile.edit', compact('employee', 'employeeDto'));
        } catch (\Exception $e) {
            return redirect()->route('user-profile')->withErrors(['message' => $e->getMessage()]);
        }
    }
}
