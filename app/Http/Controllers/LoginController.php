<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Handle the login form submission
    public function login(Request $req)
    {
        // Validate the login form inputs
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = Auth::user();
            
            if ($user->role === 'Admin') {
                return redirect()->route('adash'); // Redirect admin
            } 
            elseif ($user->role === 'Service-provider') {
                return redirect()->route('pdash',['id' => $user->id]); // Redirect service provider
            }
        
            return redirect()->route('udash'); // Redirect normal users
        }
        

        

        // If authentication fails, return back with an error
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }
    
    
        
        
}
