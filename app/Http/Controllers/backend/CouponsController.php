<?php

namespace App\Http\Controllers\backend;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupons;
use Carbon\Carbon;

class CouponsController extends Controller
{
    
    public function AllCoupon(){
        $coupon = Coupons::latest()->get();
        return view('backend.coupon.all_coupons',compact('coupon'));
    } // End Method 


    public function AddCoupon(){
        return view('backend.coupon.add_coupon');
    }// End Method 


    public function StoreCoupon(Request $request){ 
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);
    
        Coupons::create([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);
    
        NotificationHelper::show('Coupon Inserted Successfully', 'success');
        return redirect()->route('all.coupons');
    }
    
    public function EditCoupon($id){

        $coupon = Coupons::findOrFail($id);
        return view('backend.coupon.edit_coupon',compact('coupon'));

    }// End Method 


    public function UpdateCoupon(Request $request ,$coupon_id){

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

         Coupons::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        NotificationHelper::show('Coupon update Successfully', 'success');
        return redirect()->route('all.coupons');


    }// End Method 

     public function DeleteCoupon($id){

        Coupons::findOrFail($id)->delete();

        NotificationHelper::show('Coupon delete successfully', 'success');
        return redirect()->route('all.coupons');
    }// End Method 




    

}
