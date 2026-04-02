<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    public function login()
    {

        return view('posts.login');
    }
    public function loginCheck()
    {
        $email = request('email');
        $password = request('password');

        // $user = User::where('email', $email)->first();

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            if (Auth::user()->role == 'user') {
                return redirect()->route('user.show');
            } else {
                return redirect()->route('admin.index');
            }
        }


        return back()->with('error', 'Invalid email or password');
    }


    public function register()
    {
        return view('posts.register');
    }

    public function store()
    {

        //1- get the user data
        $data = request()->all();

        $id = request()->id;
        $name = request()->name;
        $email = request()->email;
        $password = request()->password;
        $role = request()->role ?? 'user';
        $created_at = request()->created_at;
        $updated_at = request()->updated_at;
        //id, name, email, password, role, created_at, updated_at
        User::create([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'created_at' => $created_at,
            'updated_at' => $updated_at

        ]);


        //2- store the user data in database

        //3- redirection to posts.index
        return to_route('posts.login');
    }
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل الخروج
        $request->session()->invalidate(); // إنهاء الجلسة
        $request->session()->regenerateToken(); // إنشاء CSRF token جديد
        return to_route('posts.login'); 
    }


}