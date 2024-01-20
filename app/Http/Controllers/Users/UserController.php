<?php

namespace App\Http\Controllers\Users;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Hash;
use App\models\Products;



class UserController extends Controller
{
    public function UserLogout(request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function UserProfile()
    {

          $allusers = User::where('id',auth()->id())->first();
        return view('frontend.show_user.profile_view',compact('allusers'));
    }


    public function userProfileStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);
    
        $user = Auth::user();
        $user->fill($request->only(['name', 'username', 'email', 'address', 'phone']));
        $user->save();
    
        NotificationHelper::show('User Profile Updated Successfully', 'success');
        return redirect()->back();
    }
    
    public function UserUpdatePassword(Request $request){
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            NotificationHelper::show("Old Password Doesn't Match", 'error');
            return redirect()->back();
            
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
       
        NotificationHelper::show(' Password Changed Successfully', 'success');
        return redirect()->back();

    } // End Mehtod 


    public function SearchProduct(Request $request){

            $query = $request->input('search');
            $results = Products::with('category')->where('product_name', 'like', '%' . $query . '%')->get();
        return view('frontend.show_user.result_search',compact('results'));
 
      }// End Method 
 

}
