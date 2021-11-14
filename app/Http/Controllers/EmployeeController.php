<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('employee_dashboard.index')
        ->with('employees', Employees::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('employee_dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employees();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = 1;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->password = Hash::make($request->password);
        $employee->created_at = Carbon::now();
        $employee->updated_at = Carbon::now();
        if ($employee->save()) {
            return View::make('employee_dashboard.index')
            ->with('employees', Employees::all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employee)
    {
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($employee_id)
    {
        $employee = Employees::find($employee_id);

        return View::make('employee_dashboard.edit')
        ->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee_id)
    {
        $employee = Employees::find($employee_id);        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = 1;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->password = Hash::make($request->password);
        $employee->created_at = Carbon::now();
        $employee->updated_at = Carbon::now();
        if ($employee->save()) {
            return View::make('employee_dashboard.index')
            ->with('employees', Employees::all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {
        $employee = Employees::find($employee_id);
        $employee->delete();
    
        if ($employee->delete()) {
            return View::make('employee_dashboard.index')
            ->with('employees', Employees::all());
        }
    }
}
