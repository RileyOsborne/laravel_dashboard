<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{

    /**
     * Instantiate a new controller instance 
     * and only allow admin to perform CRUD actions
     *
     * @return void
     */
    public function __construct()
    {
        //Prevent regular employees from executing CRUD functionality
        $this->middleware('admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('company_dashboard.index')
        ->with('companies', Companies::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('company_dashboard.create');
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
            'company_name' => 'required|string|max:100',
            'logo' => 'required|image',
            'email' => 'required|email',
            'address' => 'required|string',
            'website' => 'required|string',
        ]);

        //Store the logo and return the file path to be stored in the DB for future querying
        $logo = Storage::putFileAs('public', new File($request->file('logo')), Str::snake($request->company_name).'_logo.jpg');

        if($validated) {
            $company = new Companies();
            $company->company_name = $request->company_name;
            $company->logo = $logo;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->website = $request->website;
            if ($company->save()) {
                return View::make('company_dashboard.index')
                ->with('companies', Companies::paginate(10));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $company)
    {
        return $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id)
    {
        $company = Companies::find($company_id);

        return View::make('company_dashboard.edit')
        ->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:100',
            'logo' => 'required|image',
            'email' => 'required|email',
            'address' => 'required|string',
            'website' => 'required|string',
        ]);

        //Store the logo and return the file path to be stored in the DB for future querying
        $logo = Storage::putFileAs('public', new File($request->file('logo')), Str::snake($request->company_name).'_logo.jpg');

        if($validated) {
            $company = Companies::find($company_id);
            $company->company_name = $request->company_name;
            $company->logo = $logo;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->website = $request->website;
            if ($company->save()) {
                return View::make('company_dashboard.index')
                ->with('companies', Companies::paginate(10));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id)
    {
        $company = Companies::find($company_id);
        $company->delete();
    
        return View::make('company_dashboard.index')
        ->with('companies', Companies::paginate(10));
    }
}
