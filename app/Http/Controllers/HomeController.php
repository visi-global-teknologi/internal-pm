<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('skote.pages.profile', compact('employee'));
    }
}
