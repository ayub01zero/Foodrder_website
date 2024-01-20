<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\OrderItem;
use Auth;
use App\Helpers\NotificationHelper;
use Carbon\Carbon;

class OrderController extends Controller
{public function OrdersPage()
{
    $orders = Orders::with('user')->where('user_id', Auth::id())->latest()->get();
    return view('frontend.show_user.orders', compact('orders'));
}

public function ViewDetailsOrder($id)
{

    $orders = Orders::with('user')->where('id',$id)->where('user_id', Auth::id())->latest()->get();
    foreach ($orders as $order) {
        $orderItem = OrderItem::with('product')->where('order_id', $order->id)->orderBy('id', 'DESC')->get();
    }
    return view('frontend.show_user.order_details', compact('orders', 'orderItem'));
}


public function DeleteOrder($order_id){

    Orders::findOrFail($order_id)->update([
        'return_date' => Carbon::now()->format('d F Y'),
        'deleted_at' => Carbon::now(), 
        'return_order' => 1, 
    ]);

    NotificationHelper::show('Return Request Send Successfully','success');
    return redirect()->route('my.orders');

}// End Method 

// public function ReturnOrderPage(){

//     $orders = Orders::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
//     return view('frontend.order.return_order_view',compact('orders'));

// }// End Method 

}
