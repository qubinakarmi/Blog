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



    function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            return redirect()->intended('welcome');
        } else {
            return redirect()->intended(route('login'))->with('error', 'login failed');
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
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

            return redirect()->intended(route('blogpage'))->with('success', 'Blog has been registered');
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
        return 'list';
    }
}
