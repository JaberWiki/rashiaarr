<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function getAdminData(){
    	$admin_id = Auth::guard('admin')->id();
    	$admin_data = Admin::find($admin_id);
    	return view('admin.admin_profile_view',compact('admin_data'));
    }

    public function updateAdminData(Request $request){
    	$request->validate([
		    'name' => 'required|max:10',
		    'email' => 'required',
		  	'profile_photo_path' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
		],

		[
        'profile_photo_path.image' => 'The Admin Profile Photo Must be an Image',
        'profile_photo_path.mimes' => 'Please insert an image of type jpg, png, jpeg, gif, svg format',
        
    	]);
	
    	
    $admin = Admin::find(Auth::guard('admin')->id());
    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('backend/upload/admin/'.$admin->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/upload/admin/'),$filename);
            $admin['profile_photo_path'] = $filename;
      	}
     $admin->save();

     $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'info',
        );
     return redirect()->back()->with($notification);
    }

    public function resetAdminPassword(){
    	return view('admin.admin_reset_password');
    }

    public function updateAdminPassword(Request $request){
    	 $request->validate([
        	'old_password' => 'required',
        	'password' => 'required|min:6|confirmed',
   		]);

    	$AdminDataPassword = Admin::find(Auth::guard('admin')->id())->password;
    	if(Hash::check($request->old_password,$AdminDataPassword)){
    		$admin = Admin::find(Auth::guard('admin')->id());
    		$admin->password = Hash::make($request->password);
    		$admin->save();
    		Auth::logout();

            $notification = array(
            'message' => 'Password Updated Successfully',
            'alert-type' => 'success',
        );
    		return redirect()->route('admin.logout')->with($notification);
	    }else{
             $notification = array(
            'message' => 'Password do not matched',
            'alert-type' => 'warning',
        );
	    	return redirect()->back()->with($notification);
	    }
    }
}
