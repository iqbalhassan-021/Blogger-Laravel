<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class auth extends Controller
{

    public function login(Request $request) {
        $site_info = DB::table('siteinfo')->get();
        $blogs = DB::table('blog')->get();
        $subs = DB::table('subscribers')->get();
        // Retrieve username and password from the request
        $username = $request->input('username');
        $password = $request->input('password');
    
        // Query the database to find a user with the provided username
        $user = admin::where('username', $username)->first();
    
        // Check if a user with the provided username exists
        if ($user) {
            // Compare the provided password with the hashed password from the database
            if ($user->password === $password) {
                // Authentication successful, redirect to the dashboard or perform any other actions
                return view('admin',[
                   'site_info' => $site_info,
                   'blogs' => $blogs,
                   'subs' => $subs
                ]);
            } else {
                // Password does not match
                Session::flash('error', 'Invalid credentials.');
                return back()->withInput();
            }
        } else {
            // User with the provided username does not exist
            Session::flash('error', 'Invalid credentials.');
            return back()->withInput();
        }
    }
    public function reset(Request $request) {
        // Retrieve username and password from the request
        $username = $request->input('username');
        $newPassword = $request->input('password');

        // Query the database to find a user with the provided username
        $user = DB::table('admin')->where('username', $username)->first();

        // Check if a user with the provided username exists
        if ($user) {
            // Update user's password
            DB::table('admin')->where('username', $username)->update(['password' => $newPassword]);

            // Redirect to login page with success message
            return response()->noContent();
        } else {
            // User with the provided username does not exist
            return redirect()->back()->with('error', 'Invalid username.');
        }
    }
    

}
