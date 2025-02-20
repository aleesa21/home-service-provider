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
        return view('dashboard.profileupdate');
    }

    public function update(Request $req)
    {
        // Validate the form inputs
        $req->validate([
            'service-type' => 'required|string|max:255',
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
            'service_type' => $req->input('service-type'),
            'photo' => $photoPath,
        ]);
    
        return redirect()->route('pdash', ['id' => $user->id])->with('success', 'Profile updated successfully');
    }
    
}