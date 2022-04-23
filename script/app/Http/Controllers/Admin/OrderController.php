<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Userplan;
use App\Models\Userplanmeta;
use App\Models\User;
use App\Plan;
use App\Trasection;
use App\Mail\SubscriptionMail;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{

    protected $user_email;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth()->user()->can('order.list')) {
            return abort(401);
        }
        
        $type=$request->status ?? 'all';
        if ($request->status=='cancelled') {
           $type=0;
        }

        if (!empty($request->src) && $request->term=='email') {
            $this->user_email=$request->src;
            if ($type==='all') {
                 $posts=Userplan::whereHas('user',function($q){
                    return $q->where('email',$this->user_email);
                 })->with('user','plan_info','payment_method')->latest()->paginate(40);
             }
             else{
                $posts=Userplan::whereHas('user',function($q){
                    return $q->where('email',$this->user_email);
                 })->with('user','plan_info','payment_method')->where('status',$type)->latest()->paginate(40);
            }
        }
        elseif (!empty($request->src)) {
             if ($type==='all') {
                 $posts=Userplan::with('user','plan_info','payment_method')->where($request->term,$request->src)->latest()->paginate(40);
             }
             else{
                $posts=Userplan::with('user','plan_info','payment_method')->where($request->term,$request->src)->where('status',$type)->latest()->paginate(40);
            }
        }
        else{
          if ($type==='all') {
           $posts=Userplan::with('user','plan_info','payment_method')->latest()->paginate(40);
          }
        else{
            $posts=Userplan::with('user','plan_info','payment_method')->where('status',$type)->latest()->paginate(40);
          }  
        }

        return view('admin.order.index',compact('type','posts','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!Auth()->user()->can('order.create')) {
            return abort(401);
        }
        $payment_getway=\App\Category::where('type','payment_getway')->get();
        $posts=Plan::where('status',1)->get();
        $email=$request->email ?? '';
        return view('admin.order.create',compact('posts','email','payment_getway'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth()->user()->can('order.create')) {
            return abort(401);
        }
       
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'payment_method' => 'required',
            'transition_id' => 'required',
            'plan' => 'required',
            'notification_status' => 'required',
            'order_status' => 'required',
        ]);

        if ($request->notification_status == 'yes' && $request->content==null) {
             $msg['errors']['email_comment']='Email Comment Is Required';
             return response()->json($msg,401);
        }
        $user=User::where('email',$request->email)->where('role_id',3)->first();
        if (empty($user)) {
            $msg['errors']['user']='User Not Found';
            return response()->json($msg,401);
        }


        $order_prefix=\App\Option::where('key','order_prefix')->first();

        $trasection=new Trasection;
        $trasection->user_id=$user->id;
        $trasection->category_id = $request->payment_method;  
        $trasection->status=$request->payment_status;  
        $trasection->trasection_id=$request->transition_id;  
        $trasection->save();

        $price=Plan::find($request->plan);
        $exp_days =  $price->days;
        $expiry_date = \Carbon\Carbon::now()->addDays(($exp_days - 1))->format('Y-m-d');


        $max_id=Userplan::max('id');
        $max_id= $max_id + 1;

        $plan=new Userplan;
        $plan->order_no=$order_prefix->value.$max_id;
        $plan->amount=$price->price;
        $plan->user_id=$user->id;
        $plan->plan_id =$request->plan;
        $plan->trasection_id=$trasection->id;
        $plan->will_expired=$expiry_date;
        $plan->status=$request->order_status;
        $plan->payment_status=$request->payment_status;
        $plan->save();
        if($request->order_status == 1){
          $meta=Userplanmeta::where('user_id',$user->id)->first();
          if(empty($meta)){
            $meta=new Userplanmeta;
          }
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
        }
        

         if ($request->notification_status == 'yes'){
            $data['info']=Userplan::with('plan_info','payment_method','user')->find($plan->id);
            $data['comment']=$request->content;
            $data['to_vendor']='vendor';
            if(env('QUEUE_MAIL') == 'on'){
             dispatch(new \App\Jobs\SendInvoiceEmail($data));
            }
            else{
             Mail::to($user->email)->send(new SubscriptionMail($data));
            }
         }

        return response()->json(['Order Created Successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth()->user()->can('order.view')) {
            return abort(401);
        }
        $info=Userplan::with('plan_info','payment_method','user')->findorFail($id);
        $user=User::with('user_domain')->find($info->user->id);
       
        return view('admin.order.show',compact('info','user'));
    }

    /**
     * print invoice the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $info=Userplan::with('plan_info','payment_method','user')->findorFail($id);
        $user=User::with('user_domain')->find($info->user->id);
        $company_info=\App\Option::where('key','company_info')->first();
        $company_info=json_decode($company_info->value);
        $pdf = \PDF::loadView('email.subscription_invoicepdf',compact('company_info','info','user'));
        return $pdf->download('invoice.pdf');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('order.edit')) {
            return abort(401);
        }

        $info= Userplan::with('plan_info','payment_method')->find($id);
        $payment_getway=\App\Category::where('type','payment_getway')->get();
        $posts=Plan::get();

        return view('admin.order.edit',compact('posts','info','payment_getway'));
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
         if ($request->notification_status == 'yes' && $request->content==null) {
             $msg['errors']['email_comment']='Email Comment Is Required';
             return response()->json($msg,401);
        }

        $plan=Userplan::findorFail($id);
        $plan->plan_id =$request->plan;
        $plan->status=$request->order_status;
        $plan->save();

        if (!empty($plan->trasection_id)) {
            $trasection= Trasection::findorFail($plan->trasection_id);
            $trasection->trasection_id=$request->trasection_id;
            $trasection->category_id =$request->trasection_method;
            $trasection->status=$request->payment_status;
            $trasection->save(); 
        }
        $user=User::find($plan->user_id);
        if($request->order_status == 1){
          $meta=Userplanmeta::where('user_id',$user->id)->first();
          $price=Plan::find($plan->plan_id);
          if(empty($meta)){
            $meta=new Userplanmeta;
          }
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
        }


        if ($request->notification_status == 'yes'){
            $data['info']=Userplan::with('plan_info','payment_method','user')->find($plan->id);
            $data['comment']=$request->content;
            $data['to_vendor']='vendor';
            if(env('QUEUE_MAIL') == 'on'){
             dispatch(new \App\Jobs\SendInvoiceEmail($data));
            }
            else{
             Mail::to($user->email)->send(new SubscriptionMail($data));
            }
        }

        return response()->json(['Order Updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('order.delete')) {
            return abort(401);
        }

        if ($request->ids && !empty($request->method)) {
            if ($request->method=='delete') {
                foreach ($request->ids as $key => $id) {
                    $order=Userplan::find($id);
                    if (!empty($order->trasection_id)) {
                        Trasection::destroy($order->trasection_id);
                    }
                    $order->delete();
                }
            }
            else{
                if ($request->method=='cancelled') {
                    $status=0;
                }
                else{
                     $status=$request->method;
                }
                foreach ($request->ids as $key => $id) {
                    $order=Userplan::find($id);
                    $order->status=$status;
                    $order->save();
                }
            }
        }

        return response()->json(['Success']);
    }
}
