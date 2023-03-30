<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\EmployeeDto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('skote.pages.home');
    }

    public function profile()
    {
        $employee = Employee::with(['user', 'employee_level', 'employee_position.employee_division'])->where('user_id', Auth::user()->id)->first();
        $employeeDto = EmployeeDto::fromModel($employee);

        return view('skote.pages.profile', compact('employee', 'employeeDto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function profileEdit($uuid)
    {
        try {
            $employee = Employee::with(['user', 'employee_level', 'employee_position.employee_division'])->where('uuid', $uuid)->firstOrFail();
            $employeeDto = EmployeeDto::fromModel($employee);

            return view('skote.pages.profile.edit', compact('employee', 'employeeDto'));
        } catch (\Exception $e) {
            return redirect('profile');
        }
    }
}
