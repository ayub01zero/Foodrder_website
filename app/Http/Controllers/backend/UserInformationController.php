<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\orders;
use App\Models\OrderItem;
use App\Models\Feedback;
use App\Helpers\NotificationHelper;

class UserInformationController extends Controller
{
    public function AllUserInformation()
    {
        $allusers = User::all()->where('role', '!=', 'admin');
        return view('backend.users.info_user_orders',compact('allusers'));
    }//end method


    public function AllUserContact()
    {
        $allfeddback = Feedback::all();
        return view('backend.contact.contact_view',compact('allfeddback'));
    }//end method


    public function DeleteUser($id){

           User::findOrFail($id)->delete();
           NotificationHelper::show('user delete successfully','success');
           return redirect()->back(); 
       }// End Method 

       public function AllUserOrders($id)
       {

        $thisone = User::where('id',$id)->first();
        $UserOrder = orders::with('user')->where('user_id',$id)->get();
       
        return view('backend.users.orders_view',compact('UserOrder','thisone'));
       }


       public function AllDetails($id)
        {
        
              $orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
              return view('backend.users.order_view_detail',compact('orderItem'));
            
        }
       

}
