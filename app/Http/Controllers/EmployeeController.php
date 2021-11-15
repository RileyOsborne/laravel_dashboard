<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class EmployeeController extends Controller
{

    /**
     * Instantiate a new controller instance 
     * and only allow admin to perform CRUD actions
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employee = Employees::find(1);
        // $company = $employee->companies->company_name;
        // dd($company);
        return View::make('employee_dashboard.index')
        ->with('employees', Employees::paginate(10));
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
        $validated = $request->validate([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'company_name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required|min:6'
        ]);

        $company = DB::table('companies')->where('company_name', $request->company_name)->first();

        if($validated) {
            $employee = new Employees();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->company_id = $company->company_id;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->password = $request->password;
            if ($employee->save()) {
                return View::make('employee_dashboard.index')
                ->with('employees', Employees::paginate(10));
            }
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

        $validated = $request->validate([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'company_name' => 'required|string|max:20',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required|min:6'
        ]);

        $company = DB::table('companies')->where('company_name', $request->company_name)->first();

        if($validated) {
            $employee = Employees::find($employee_id);
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->company_id = $company->company_id;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->password = $request->password;
            if ($employee->save()) {
                return View::make('employee_dashboard.index')
                ->with('employees', Employees::paginate(10));
            }
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
    
        return View::make('employee_dashboard.index')
        ->with('employees', Employees::paginate(10));
    }
}
