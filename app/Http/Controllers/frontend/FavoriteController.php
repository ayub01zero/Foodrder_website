<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\favorite;
use App\Helpers\NotificationHelper;
use Auth;
use Carbon\Carbon;

class FavoriteController extends Controller
{

    public function FavoritePage(){
        $wishlist = favorite::with('product')->where('user_id', Auth::id())->latest()->get();
        $wishQty = favorite::count(); 
        return view('frontend.show_user.favorite', compact('wishlist', 'wishQty'));
    }

    public function AddFavorite($id)
    {
    
     if (Auth::check()) {
         $exists = favorite::where('user_id',Auth::id())->where('product_id', $id)->first();
   
               if (!$exists) {
                 favorite::insert([
                   'user_id' => Auth::id(),
                   'product_id' =>  $id,
                   'created_at' => Carbon::now(),
 
                  ]);
                  NotificationHelper::show('Product insert to favorite successfully','success');
                  return redirect()->back();
               } else{
                 NotificationHelper::show(' you already add this product in favorite','error');  
                 return redirect()->back();
               } 
   
           }else{
             NotificationHelper::show('please login ','error');
             return redirect()->back();
           }
   
       } // End Method 


    public function RemoveFavorite($id){

         favorite::where('user_id',Auth::id())->where('id',$id)->delete();
         NotificationHelper::show('product remove from favorite ','error');
         return redirect()->back();

    }// End Method




   }
    

