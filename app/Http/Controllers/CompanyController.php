<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('company_dashboard.index')
        ->with('companies', Companies::all());
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

        $logo = Storage::putFileAs('public', new File($request->file('logo')), Str::snake($request->company_name).'_logo.jpg');

        $company = new Companies();
        $company->company_name = $request->company_name;
        $company->logo = $logo;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->updated_at = Carbon::now();
        if ($company->save()) {
            return View::make('company_dashboard.index')
            ->with('companies', Companies::all());
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
        $logo = Storage::putFileAs('public', new File($request->file('logo')), Str::snake($request->company_name).'_logo.jpg');

        $company = Companies::find($company_id);        
        $company->company_name = $request->company_name;
        $company->logo = $logo;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->updated_at = Carbon::now();
        if ($company->save()) {
            return View::make('company_dashboard.index')
            ->with('companies', Companies::all());
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
        ->with('companies', Companies::all());
    }
}
