<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    function dashboard()
    {
        return view('dashboard');
    }

    function showlogin()
    {
        return view('login');
    }
    function register(Request $request)

    {
        
    $request->validate([
        'username'=>'required|min:8',
        'email'=>'required|email',
        'password'=>'required|min:8|confirmed',
    ]);

   $users=new User();
    $users->name=$request->username;
    $users->email=$request->email;
    $users->password=$request->password;
    if($users->save())

        {
            return redirect('login')->with('success','user Register successful');
        }


        else{
            return 'error';
        }
  



 

    }



    function login(Request $request)
    {
    
      $credentials= $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('welcome');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect(route('login'));
}


}
     
 