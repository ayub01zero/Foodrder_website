<?php

namespace App\Http\Controllers\frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\orders;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use App\Helpers\NotificationHelper;
use App\Models\coupons;
use Illuminate\Support\Facades\Session;
use App\Notifications\orderNotification;
use Illuminate\Support\Facades\Notification;
use Auth;

class SetOrderController extends Controller
{

    public function FetchProductOrder($id)
    {

       $GetProduct = Products::where('id' , $id)->get();
       return view('frontend.show_user.addorder',compact('GetProduct'));

    }

    public function AddToCartOrder(Request $request, $id){

        $product = Products::findOrFail($id);

        $request->validate([
            'qty' => 'required',
        ]);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->qty,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                ],

            ]);

            NotificationHelper::show('Successfully Added on Your Cart','success');
       

        }else{

            Cart::add([

                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    
                ],
            ]);

            NotificationHelper::show('Successfully Added on Your Cart','success');
        
        }
        
        $this->updateCouponSession();
        return redirect()->route('Foods');

    }// End Method


    public function FetchAllOrders(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        if(Cart::content()->count() < 1)
        {
           if(Session::has('coupon')){
            Session::forget('coupon');
        }  
        }
    
        return view('frontend.show_user.shopping_cart',compact('carts', 'cartQty', 'cartTotal'));
    }
    

    public function DeleteCart($rowId){
        Cart::remove($rowId);

        $this->updateCouponSession();
        NotificationHelper::show('Successfully product remove','success');
            return redirect()->route('my.cart');

    }// End Method

    public function CouponApply(Request $request){

        $request->validate([
            'coupon_name' => 'required',
        ]);
        
        if(Cart::content()->count() < 1)
        {
           
            NotificationHelper::show('please add product to shopping cart', 'error');
            return redirect()->route('my.cart')->withInput();

        }else{

     
            $coupon = Coupons::where('coupon_name', $request->coupon_name)
            ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
            ->where('used', false)
            ->first();

     if ($coupon) {
    
     $coupon->used = true;
     $coupon->save();


            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name, 
                'coupon_discount' => $coupon->coupon_discount, 
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100 )
            ]);

                          
                NotificationHelper::show('Coupon Applied Successfully', 'success');
                return redirect()->route('my.cart')->withInput();
         
        } else{
            NotificationHelper::show('Invalid Coupon', 'error');
            return redirect()->route('my.cart')->withInput();
         
        }

    }
}


public function updateCouponSession() {
    if(Session::has('coupon')){
        $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupons::where('coupon_name',$coupon_name)->first();

        Session::put('coupon', [
            'coupon_name' => $coupon->coupon_name, 
            'coupon_discount' => $coupon->coupon_discount, 
            'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
            'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100 )
        ]); 
    }
}


public function checkoutOrders(Request $request){

     $user = User::where('role','admin')->get();

    if(Session::has('coupon')){
        $total_amount = Session::get('coupon')['total_amount'];
    }else{
        $total_amount = round(Cart::total());
    }


    $order_id = Orders::insertGetId([
        'user_id' => Auth::id(),
        'amount' => $total_amount,
        'order_number' => 'NUM'.mt_rand(10000000,99999999),
        'order_date' => Carbon::now()->format('d F Y'),
        'order_month' => Carbon::now()->format('F'),
        'order_year' => Carbon::now()->format('Y'), 
        'status' => 'pending',
        'created_at' => Carbon::now(),  
    ]);

    $carts = Cart::content();
    foreach($carts as $cart){

        OrderItem::insert([
            'order_id' => $order_id,
            'product_id' => $cart->id,
            'qty' => $cart->qty,
            'price' => $cart->price,
            'created_at' =>Carbon::now(),

        ]);

    } // End Foreach

    if (Session::has('coupon'))
     {
       Session::forget('coupon');
     }

    Cart::destroy();
    
    Notification::send($user, new orderNotification());
    NotificationHelper::show('Your Order Place Successfully', 'success');
    return redirect()->route('my.orders'); 

}// End Method 




}


