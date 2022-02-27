<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register', [
            'title' => 'Register',
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);
        // $validate = bcrypt($validate['password']);
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);


        // $request->session()->flash('status', 'Task was successful!');
        // return redirect('/login');

        return redirect('/login')->with('success1', 'Register Successful, Please login !');
    }
}
