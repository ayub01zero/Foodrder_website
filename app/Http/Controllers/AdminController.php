<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\NotificationHelper;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
          
        $GetOrders = orders::with('user')->where('return_order',null)->where('status','pending')->get();
        return view('admin.admin_dashboard',compact('GetOrders'));
       
    }//end method


    public function AdminLogout(request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }


    public function AdminProfile()
    {
      
        $adminData = User::find(Auth::id());
        return view('admin.profile.admin_profile_view',compact('adminData'));
    }//end method


    public function AdminProfileStore(Request $request){

       
        $user = User::find(Auth::id());

        if ($user) {
            $user->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ]);
        }
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/AdminData/'.$user->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/AdminData'),$filename);
            $user['photo'] = $filename;
        }

        $user->save();

        NotificationHelper::show('profile updated', 'success');
        return redirect()->back();
    } // End Mehtod 


    public function AdminPassword()
    {
        $adminData = User::find(Auth::id());
        return view('admin.profile.admin_password',compact('adminData'));
    }//end method


    public function AdminUpdatePassword(Request $request){
        // Validation 
      
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6', 
        ]
);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            NotificationHelper::show('old password is not correct', 'error');
            return back();

        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
      
      
        NotificationHelper::show('Profile updated successfully', 'success');
        return back();

    } // End Mehtod 

    public function ConfirmToProcess($order_id){
        Orders::findOrFail($order_id)->update([
            'status' => 'confirm'
        ]);

        NotificationHelper::show('Order confirm Successfully', 'success');
        return redirect()->back();

    }// End Method 




}
