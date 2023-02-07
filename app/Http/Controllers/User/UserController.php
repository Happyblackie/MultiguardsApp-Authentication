<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//step m
use App\Models\User; //import model
use Illuminate\Support\Facades\Auth; //import auth facade

class UserController extends Controller
{   
    //step m
    // create methods
    function create(Request $request)
    {
        //validate inputs, you can use regular expression here as well
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        /* part o */ 
        /* if validation is success insert new users to users table */
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;   
        $user->password = \Hash::make($request->password);  // \Hash => creates hashed passwords
        $save = $user->save(); 
        //if user inserted successfully, show success message
        if($save){
            return redirect()->back()->with('success','You are now registred successfully');    
        }else{
            return redirect()->back()->with('fail',' Something went wrong, failed to register');
        }

    }

    /* step r */
    //login check method
    function check(Request $request)
    {
        //validate inputs
        $request->validate([
            
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30',
            
        ],
        /* step s */[
            'email.exists'=>'selected email not existing on users table'
        ]);

        //step t         check login credentials
        $credentials = $request->only('email', 'password');
     /*  added guard('web') at step v vi */    
        if( Auth::guard('web')->attempt($credentials)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

       /* step u i*/
    //logout method
    function logout()
    { 
    /*  added guard('web') at step v vi */
        Auth::guard('web')->logout();
        return redirect('/');
    }
   
    
}
