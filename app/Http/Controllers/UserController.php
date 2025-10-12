<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Blog;

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
            'username' => 'required|min:8',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $users = new User();
        $users->name = $request->username;
        $users->email = $request->email;
        $users->password = $request->password;
        if ($users->save()) {
            return redirect('login')->with('success', 'user Register successful');
        } else {
            return 'error';
        }
    }



    // Show user login form
public function showUserLogin()
{
    return view('user.login'); // make sure view folder is user/login.blade.php
}

// Handle user login
public function userLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Only allow non-admin users here (role != admin)
    if (Auth::attempt(array_merge($credentials, ['user_type' => 'user']))) {
        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

// Show admin login form
public function showAdminLogin()
{
    return view('admin.login'); // make sure view folder is admin/login.blade.php
}

// Handle admin login
public function adminLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Only allow admin users here (role = admin)
    if (Auth::attempt(array_merge($credentials, ['user_type' => 'admin']))) {
        $request->session()->regenerate();
        return redirect()->intended(route('list.blog')); // or admin dashboard
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}




  public function logout(Request $request)
{
    $user = Auth::user(); // Save user before logging out

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect based on user_type (or isAdmin logic)
    if ($user && $user->user_type === 'admin') {
        return redirect()->route('admin.login');
    }

    return redirect()->route('login'); // user login
}




    function blog(Request $request)
    {




        $data = new Blog();
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('blog_images'), $imageName);
            $data->file = $imageName;
        }



        if ($data->save()) {

            return redirect()->intended(route('list.blog'))->with('success', 'Blog has been registered');
        } else {
            die('error');
        }
    }






    function showBlogs()
    {
        // Fetch all blogs from database
        $blogs = Blog::latest()->get();

        // Send data to Blade view
        return view('blogpage', compact('blogs'));
    }

    function bloglist()
    {
       $blogs = Blog::latest()->get();
        return view('blog-list', compact('blogs'));
    }


    function blogdelete($id)
    {

      $deleted_blog=Blog::destroy($id);
 
      if($deleted_blog)
      {
          return redirect()->intended(route('list.blog'));
      }
      else{
        die('error');
      }
      
    }


    
}
