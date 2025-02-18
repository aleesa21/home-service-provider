<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $req){
        
        $req->validate([
            'register-as' => 'required|in:Customer,Service-provider',
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|',
            'address'=>'required|string|max:500',
            'password'=>'required',
            'confirm-password'=>'required|same:password',


        ]);

        // Save user data to the database
        User::create([
            'role' => $req->input('register-as'),
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'phone' => $req->input('phone'),
            'address' => $req->input('address'),
            'password' => Hash::make($req->input('password')), 
        ]);

          // Redirect with a success message
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }
}
