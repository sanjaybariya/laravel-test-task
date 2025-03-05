<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibilityCriteria;

class EligibilityCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eligiblityCritera=EligibilityCriteria::paginate(5);
        return view("eligibility_criteria.index",compact("eligiblityCritera"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("eligibility_criteria.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'age_less_than'=>'nullable|integer|min:0',
            'age_greater_than'=>'nullable|integer|min:0',
            'last_login_days_ago'=>'nullable|integer|min:0',
            'income_less_than'=>'nullable|numeric|min:0',
            'income_greater_than'=>'nullable|numeric|min:0',
        ]);
        EligibilityCriteria::create($request->all());
        return redirect()->route("eligibility-criteria.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     
     public function edit($id)
    {
        $eligibilityCriteria=EligibilityCriteria::find($id);
        return view('eligibility_criteria.edit',compact('eligibilityCriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'age_less_than'=>'nullable|integer|min:0',
            'age_greater_than'=>'nullable|integer|min:0',
            'last_login_days_ago'=>'nullable|integer|min:0',
            'income_less_than'=>'nullable|numeric|min:0',
            'income_greater_than'=>'nullable|numeric|min:0',
        ]);
        $eligibilityCriteria=EligibilityCriteria::find($id);
        $eligibilityCriteria->name=$request->get('name');
        $eligibilityCriteria->age_less_than=$request->get('age_less_than');
        $eligibilityCriteria->age_greater_than=$request->get('age_greater_than');
        $eligibilityCriteria->last_login_days_ago=$request->get('last_login_days_ago');
        $eligibilityCriteria->income_greater_than=$request->get('income_greater_than');
        $eligibilityCriteria->save();
        return redirect()->route("eligibility-criteria.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eligibilityCriteria=EligibilityCriteria::find($id);
        $eligibilityCriteria->delete();
        return redirect()->route("eligibility-criteria.index");
    }
}
