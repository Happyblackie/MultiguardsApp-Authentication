<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

   //step y ii
use App\Models\Adm;
use Illuminate\Support\Facades\Auth;

class AdmController extends Controller
{
    //step y ii
    function check(Request $request)
    {
        //validate inputs
        $request->validate([
            'email'=>'required|email|exists:adms,email',
            'password'=>'required|min:5|max:30',
        ],
         /* step z*/[
            'email.exists'=>'selected email not existing on users table'
        ]);

       /*  step z i */
       /* check admin login credentials */
       $credentials = $request->only('email','password');
       if(Auth::guard('adm')->attempt($credentials)){
            return redirect()->route('adm.home');
       }else{
        return redirect()->route('adm.login')->with('fail','incorrect credentials');
       }
    }

       /* part 2 b step ii*/
    //logout method
    function logout()
    { 

        Auth::guard('adm')->logout();
        return redirect('/welcomeadmin');
    }
}
