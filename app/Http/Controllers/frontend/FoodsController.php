<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;
use Carbon\Carbon;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Helpers\NotificationHelper;

class FoodsController extends Controller
{
    public function FoodPage()
    {
        $allproducts =Products::paginate(3);
        return view('frontend.show_user.foods', compact('allproducts'));
    }
    public function FoodCategory($id)
    {
        $allproducts =Products::where('category_id', $id)->paginate(3);
        return view('frontend.show_user.foods', compact('allproducts'));
    }

}



   

