<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProviderProfileUpdateController extends Controller
{
    /**
     * Show the form for editing the provider's profile.
     */
    public function edit($id)
    {
        // Retrieve the provider's details
        $provider = User::findOrFail($id);

        // Pass the provider to the view
        return view('dashboard.providerprofileupdate', compact('provider'));
    }

    /**
     * Update the provider's profile in the database.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        // Ensure the authenticated user is an instance of User
        if (!$user instanceof User) {
            return back()->withErrors(['error' => 'Invalid user model instance.']);
        }

        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required|string',
            'service_type' => 'required|array',  // Expecting an array for service types
            'service_type.*' => 'string',        // Each service type should be a string
            'photo' => 'nullable|image|mimes:jpg,png,jpegs'
        ]);

        // Convert service types array to JSON and store it
        $validatedData['service_type'] = json_encode($request->service_type);
    

        //  // Handle photo upload
        //  if ($request->hasFile('photo')) {
        //     if ($user->photo) {
        //         Storage::delete('public/profile_photos/' . $user->photo);
        //     }
        //     $photoPath = $request->file('photo')->store('profile_photos', 'public');
           

        //     $validatedData['photo'] = basename($photoPath);
        // } 
        // if ($request->hasFile('photo')) {
        
        //     if ($user->photo) {
        //         Storage::delete('public/' . $user->photo);
        //     }
        
        //     // Store new photo and save the full path
        //     $photoPath = $request->file('photo')->store('profile_photos', 'public');
        
        //     // Store full path in the database
        //     $validatedData['photo'] = 'storage/' . $photoPath; // This ensures it's accessible in Blade
        // }
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }
        
            // Store the photo and get the relative path
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
        
            // Store the relative path without the 'storage/' prefix
            $validatedData['photo'] = $photoPath; // This stores 'profile_photos/filename.jpg'
        }
        
        



        
        // Update the user's record with the validated data
        $user->update($validatedData);

        // Redirect to the dashboard with a success message
        return redirect()->route('pdash', ['id' => $user->id])->with('success', 'Profile updated successfully!');
    }
}
