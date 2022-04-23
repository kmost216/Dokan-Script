<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;
use App\Models\User;
use Auth;
use App\Subscriber;
class PlanController extends Controller
{
    protected $id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       if (!Auth()->user()->can('plan.list')) {
           abort(401);
       }
       $posts=Plan::withCount('active_users')->latest()->get();
       return view('admin.plan.index',compact('posts'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!Auth()->user()->can('plan.create')) {
           abort(401);
       }
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->is_default == 1){
            Plan::where('is_default',1)->update(['is_default'=>0]);
        }
        $plan=new Plan;
        $plan->name=$request->name;
        $plan->description=$request->description;
        $plan->price=$request->price;
        $plan->days=$request->days;
        $plan->product_limit=$request->product_limit;
        $plan->custom_domain=$request->custom_domain;
        $plan->storage=$request->storage;
        $plan->status=$request->status;
        $plan->customer_limit=$request->customer_limit;
        $plan->category_limit=$request->category_limit;
        $plan->location_limit=$request->location_limit;
        $plan->brand_limit=$request->brand_limit;
        $plan->variation_limit=$request->variation_limit;
        $plan->featured=$request->featured;
        $plan->is_default=$request->is_default;
        $plan->save();

        return response()->json(['Plan Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth()->user()->can('plan.show')) {
           abort(401);
        }
        $this->id=$id;
       
        $posts=User::where('role_id',3)->whereHas('user_plan',function($q){
            return $q->where('plan_id',$this->id);
        })->with('user_domain','user_plan')->latest()->paginate(40);
        return view('admin.plan.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('plan.edit')) {
           abort(401);
        }
        $info=Plan::find($id);
        return view('admin.plan.edit',compact('info'));
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
        if($request->is_default == 1){
            Plan::where('is_default',1)->update(['is_default'=>0]);
        }
        $plan=Plan::find($id);
        $plan->name=$request->name;
        $plan->description=$request->description;
        $plan->price=$request->price;
        $plan->days=$request->days;
        $plan->product_limit=$request->product_limit;
        $plan->custom_domain=$request->custom_domain;
        $plan->storage=$request->storage;
        $plan->status=$request->status;
        $plan->customer_limit=$request->customer_limit;
        $plan->category_limit=$request->category_limit;
        $plan->location_limit=$request->location_limit;
        $plan->brand_limit=$request->brand_limit;
        $plan->variation_limit=$request->variation_limit;
        $plan->featured=$request->featured;
        $plan->is_default=$request->is_default;
        $plan->save();

        return response()->json(['Plan Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!empty($request->type)) {
         if ($request->type=='delete') {
             foreach ($request->ids as $row) {
                Plan::destroy($row);
            }
        }
        
       }
        return response()->json(['Category Deleted']);
    }
}
