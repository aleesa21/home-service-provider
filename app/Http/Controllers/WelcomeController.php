<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User model

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch all service providers from the database
        $providers = User::where('role', 'Service-provider')->get(); // Adjust role column if different

        // Pass the providers to the welcome view
        return view('welcome', compact('providers'));
    }
}
