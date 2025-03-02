<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProviderProfileDisplayController extends Controller
{
    public function show(){

        $providers= User::where('role', 'Service-provider')->get();
        
        // Return the view with the providers data
        return view('dashboard.userdash', compact('providers'));
    }
    

}
