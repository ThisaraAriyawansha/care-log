<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use Auth;
use Hash;
use Illuminate\Support\Facades\File;



class SettingsController extends Controller
{
    public function settings()
    {
        return view('settings.settings');
    }

    public function changePassword()
    {
        $data['header_title'] = "Change Password";
        return view('settings.changePassword', $data);
    }
    
    public function updateChangePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'old_password' => 'required|string',  // Ensure old password is provided
            'new_password' => 'required|string|min:5|confirmed',  // Ensure 'new_password' is confirmed
            'new_password_confirmation' => 'required|string|min:5',  // Make sure the confirmation field is required
        ]);
    
        // Fetch the authenticated user
        $user = User::find(Auth::user()->id);  // or User::where('id', Auth::user()->id)->first();
        
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        // Check if the old password matches the stored one
        if (Hash::check($request->old_password, $user->password)) {
            // Update the password and save it
            $user->password = Hash::make($request->new_password);
            $user->save();
    
            return redirect()->back()->with('success', "Password successfully updated");
        } else {
            return redirect()->back()->with('error', "Old Password is not correct");
        }
    }
    
    
}
