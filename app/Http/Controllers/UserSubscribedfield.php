<?php


namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserSubscribedfield extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    function __construct()
//    {
//         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
//         $this->middleware('permission:product-create', ['only' => ['create','store']]);
//         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
//         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function showSubfield(){
        $detail = DB::table('tbl_services_subscribed')
                ->select('tbl_employees.name','tbl_services_subscribed.user_id')
                ->leftjoin('tbl_employees','tbl_employees.id','tbl_services_subscribed.user_id')
                ->groupBy('user_id')
                ->get();
        return view('user_subscription_data.subscription_field',['detail'=>$detail]);
    }
    
    public function addSubscription(){
        return view('subscription.add_subscription');
    }

}