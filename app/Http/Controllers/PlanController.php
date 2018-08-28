<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Http\Requests\PlanRequest;


class PlanController extends Controller
{
	public function index(Request $request)
    {
    	$plans= Plan::Search($request->s)->orderBy('id','DESC')->paginate();
        return view('plans.index',compact('plans'));
    }

    public function create()
    {
    	return view('plans.create');
    }

    public function store(PlanRequest $request)
    {
    	$plan = new Plan;
    	$plan->nombre  = mb_strtoupper($request->nombre,'UTF-8');

        $plan->save();
    	return redirect()->route('plans.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $plan  = Plan::find($id);
        return view('plans.edit',compact('plan'));
    }

    public function update(planRequest $request, $id)
    {
        $plan = Plan::find($id);
        $plan->nombre   = mb_strtoupper($request->nombre,'UTF-8');
        $plan->save();
        return redirect()->route('plans.index');
    }   
}
