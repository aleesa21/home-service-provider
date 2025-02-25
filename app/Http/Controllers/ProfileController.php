<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
         // Get the current logged-in user
    $user = Auth::user();  // This gets the authenticated user

    // Decode the service_type JSON into an array
    $serviceTypes = json_decode($user->service_type, true);

    // Return the view with user data and decoded service types
    return view('dashboard.profileupdate', compact('user', 'serviceTypes'));
    }

    public function update(Request $req)
    {
        // Validate the form inputs
        $req->validate([
            'service-type' => 'required|array|min:1',  
            'service-type.*' => 'string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Handle photo upload if exists
        $photoPath = null;
        if ($req->hasFile('photo')) {
            $photoPath = $req->file('photo')->store('profile_photos', 'public');
        }
    
        // Get current logged-in user and find them in the database
        $user = User::find(Auth::id());  // This ensures $user is an Eloquent model
    
        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }
    
        // Update the user's data
        $user->update([
            'service_type' => json_encode($req->input('service-type')), // Convert array to JSON  
            'photo' => $photoPath,
        ]);
    
        // Redirect back to the dashboard with a success message
        return redirect()->route('pdash', ['id' => $user->id])->with('success', 'Profile updated successfully');
    }
    

}
