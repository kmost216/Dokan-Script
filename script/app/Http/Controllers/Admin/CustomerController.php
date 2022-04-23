<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Userplan;
use App\Trasection;
use App\Domain;
use App\Plan;
use App\Term;
use Hash;
use App\Models\Userplanmeta;
use App\Models\Customer;
class CustomerController extends Controller
{
    protected $request;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth()->user()->can('customer.list')) {
            return abort(401);
        }
        $type=$request->type ?? 'all';
        if ($type=="trash") {
           $type=0;
        }
        //return $request;
        if (!empty($request->src) && $request->term=="domain") {
            $this->request=$request->src;
            if ($type === 'all') {

              $posts=User::where('role_id',3)->whereHas('user_domain',function($q){
                return $q->where('domain',$this->request);
            })->with('user_domain','user_plan')->latest()->paginate(40);
            }
            else{
                $posts=User::where('role_id',3)->where('status',$type)->whereHas('user_domain',function($q){
                    return $q->where('domain',$request->src);
                })->with('user_domain','user_plan')->where('status',$type)->latest()->paginate(40);
            }
            
        }
        elseif (!empty($request->src) && !empty($request->term)) {
             if ($type === 'all') {
             $posts=User::where('role_id',3)->with('user_domain','user_plan')->where($request->term,$request->src)->latest()->paginate(40);
             }
             else{
                $posts=User::where('role_id',3)->where('status',$type)->with('user_domain','user_plan')->where($request->term,$request->src)->latest()->paginate(40);
             }
        }
        else{  
           if ($type === 'all') { 
            $posts=User::where('role_id',3)->with('user_domain','user_plan')->latest()->paginate(40);
           }
           else{
             $posts=User::where('role_id',3)->where('status',$type)->with('user_domain','user_plan')->latest()->paginate(40);
           }
        }


        $all=User::where('role_id',3)->count();
        $actives=User::where('role_id',3)->where('status',1)->count();
        $suspened=User::where('role_id',3)->where('status',2)->count();
        $trash=User::where('role_id',3)->where('status',0)->count();
        $requested=User::where('role_id',3)->where('status',4)->count();
        $pendings=User::where('role_id',3)->where('status',3)->count();
        return view('admin.customer.index',compact('posts','request','type','all','actives','suspened','trash','requested','pendings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('customer.create')) {
            return abort(401);
        }

        return view('admin.customer.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users|email|max:255',
            'name' => 'required',
            'password' => 'required',
            'plan' => 'required',
            'domain_name' => 'required|max:100|unique:domains,domain',
            'full_domain' => 'required|max:100|unique:domains,full_domain',
        ]);

        $order_prefix=\App\Option::where('key','order_prefix')->first();
        $price=Plan::find($request->plan);
        if($price->is_default == 1){
           $validatedData = $request->validate([
            
            'trasection_id' => 'required',
            'trasection_method' => 'required',
            
          ]);
        }

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->status=1;
        $user->role_id=3;
        $user->save();

        $domain=new Domain;
        $domain->domain=$request->domain_name;
        $domain->full_domain=$request->full_domain;
        $domain->user_id=$user->id;
        $domain->status=$request->domain_status;
        $domain->save();   

        
       
        $exp_days =  $price->days;
        $expiry_date = \Carbon\Carbon::now()->addDays(($exp_days - 1))->format('Y-m-d');


        $max_id=Userplan::max('id');
        $max_id= $max_id + 1;

        $trasection=new Trasection;
        $trasection->user_id= $user->id;
        $trasection->category_id = $request->trasection_method;  
        $trasection->status=1;  
        $trasection->trasection_id=$request->trasection_id;  
        $trasection->save();
        
        

        $plan=new Userplan;
        $plan->order_no=$order_prefix->value.$max_id;
        $plan->amount=$price->price;
        $plan->user_id=$user->id;
        $plan->plan_id =$request->plan;
        $plan->trasection_id=$trasection->id;
        $plan->will_expired=$expiry_date;
        $plan->status=1;
        $plan->save();


        $meta=new Userplanmeta;
        $meta->user_id=$user->id;
        $meta->name=$price->name;
        $meta->product_limit=$price->product_limit;
        $meta->storage=$price->storage;
        $meta->customer_limit=$price->customer_limit;
        $meta->category_limit=$price->category_limit;
        $meta->location_limit=$price->location_limit;
        $meta->brand_limit=$price->brand_limit;
        $meta->variation_limit=$price->variation_limit;
        
        $meta->save();

        

        $user_up=User::find($user->id);
        $user_up->domain_id=$domain->id;
        $user_up->save();

        return response()->json(['Customer Created Successfully']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if (!Auth()->user()->can('customer.view')) {
            return abort(401);
       }

       $info=User::withCount('term','orders','customers')->where('role_id',3)->with('user_domain','user_plan')->findorFail($id);
       $histories=Userplan::with('plan_info','payment_method')->where('user_id',$id)->latest()->paginate(20);

        $customers=Customer::withCount('orders')->where('created_by',$id)->latest()->paginate(20);
        $posts=\App\Term::where('user_id',$id)->latest()->paginate(40);
       return view('admin.customer.show',compact('info','histories','customers','posts'));
    }

    public function planview($id)
    {
       if (!Auth()->user()->can('customer.edit')) {
            return abort(401);
       }

       $info=User::withCount('term','orders','customers')->where('role_id',3)->findorFail($id);
      
       $planinfo=Userplanmeta::where('user_id',$id)->first();
       abort_if(empty($planinfo),404);
       return view('admin.customer.planinfo',compact('info','planinfo'));
    }

    public function updateplaninfo(Request $request, $id)
    {
       $planinfo=Userplanmeta::findorFail($id);
       $planinfo->product_limit=$request->product_limit;
       $planinfo->storage=$request->storage;
       $planinfo->customer_limit=$request->customer_limit;
       $planinfo->category_limit=$request->category_limit;
       $planinfo->location_limit=$request->location_limit;
       $planinfo->brand_limit=$request->brand_limit;
       $planinfo->variation_limit=$request->variation_limit;
       $planinfo->save();

       return response()->json('Info Updated Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!Auth()->user()->can('customer.edit')) {
            return abort(401);
        }

        $info=User::findorFail($id);
        return view('admin.customer.edit',compact('info'));
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
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
        ]);

         $user=User::findorFail($id);
         $user->name=$request->name;
         $user->email=$request->email;
         if ($request->password) {
             $user->password=Hash::make($request->password);
         }
         $user->status=$request->status;
         $user->save();

         return response()->json(['User Updated Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('customer.delete')) {
            return abort(401);
        }

        if ($request->type=="term_delete") {
            foreach ($request->ids ?? [] as $key => $id) {
                \App\Term::destroy($id);
            }
        }
        elseif ($request->type=="user_delete") {
            foreach ($request->ids ?? [] as $key => $id) {
                \App\Models\Customer::destroy($id);
            }
        }
        else{
            if (!empty($request->method)) {
                if ($request->method=="delete") {
                    foreach ($request->ids ?? [] as $key => $id) {
                       \File::deleteDirectory('uploads/'.$id);
                       $user=User::destroy($id);
                    }
                }
                else{
                    foreach ($request->ids ?? [] as $key => $id) {
                       $user=User::find($id);
                       if ($request->method=="trash") {
                          $user->status=0;
                       }
                       else{
                        $user->status=$request->method;
                       }
                       $user->save();
                    }
                }
            }

        }

        return response()->json(['Success']);


    }
}
