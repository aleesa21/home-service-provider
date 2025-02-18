<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProviderController extends Controller
{
    public function dashboard($id)
    {
        // Get the provider's details from the users table
        $provider = User::where('id', $id)
                        ->where('role', 'Service-provider')
                        ->firstOrFail();

        return view('dashboard.providerdash', compact('provider'));
    }
}
