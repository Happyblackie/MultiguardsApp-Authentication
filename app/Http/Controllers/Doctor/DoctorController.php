<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* PART J */
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    function create(Request $request)
    {
        //
        //validate inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:doctors,email',
            'hospital'=>'required',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ],
        /* step z*/[
            'email.exists'=>'selected email not existing on users table'
        ]);

        /* part 3 k */ 
            /* if validation is success insert new doctorto doctor table */
            $doctor = new Doctor();
            $doctor->name = $request->name;
            $doctor->email = $request->email;   
            $doctor->hospital = $request->hospital;   
            $doctor->password = \Hash::make($request->password);  // \Hash => creates hashed passwords
            $save = $doctor->save(); 
            //if user inserted successfully, show success message
            if($save){
                return redirect()->back()->with('success','You are now registred successfully');    
            }else{
                return redirect()->back()->with('fail',' Something went wrong, failed to register');
            }

    }

     /*part 3 l */
    //login check method
    function check(Request $request)
    {
        //validate inputs
        $request->validate([
            
            'email'=>'required|email|exists:doctors,email',
            'password'=>'required|min:5|max:30',
            
        ],
        [
            'email.exists'=>'selected email not existing on users table'
        ]);

        //part 3 l        check login credentials
        $credentials = $request->only('email', 'password');
   
        if( Auth::guard('doctor')->attempt($credentials)){
            return redirect()->route('doctor.home');
        }else{
            return redirect()->route('doctor.login')->with('fail','Incorrect credentials');
        }
    }

       /* part 3 n step i*/
    //logout method
    function logout()
    { 

        Auth::guard('doctor')->logout();
        return redirect('/welcomedoctor');
    }
}
