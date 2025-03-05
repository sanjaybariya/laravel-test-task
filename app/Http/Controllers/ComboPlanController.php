<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\ComboPlan;

class ComboPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("combo_plans.index",["comboPlans"=>ComboPlan::with('plans')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("combo_plans.create",['plans'=>Plan::all()]);
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
            'price'=>'required|numeric',
            'plans'=>'required|array',
        ]);
        $comboPlan=ComboPlan::create($request->only(['name','price']));
        $comboPlan->plans()->attach($request->plans);
        return redirect()->route('combo-plans.index')->with('success','Combo plan created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ComboPlan $comboPlan)
    {
        return view('combo_plans.edit',['comboPlan'=>$comboPlan,
        'plans'=>Plan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComboPlan $comboPlan)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'plans'=>'required|array',
        ]);
        $comboPlan->update($request->only(['name','price']));
        $comboPlan->plans()->sync($request->plans);
        return redirect()->route('combo-plans.index')->with('success','Combo plan created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComboPlan $comboPlan)
    {
        $comboPlan->delete();
        return redirect()->route("combo-plans.index")->with("success","Plan deleted successfully");
    }
}
