<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('customer-account', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:50|regex:/^[A-Za-z\s]+$/',
            'last_name' => 'required|string|max:50|regex:/^[A-Za-z\s]+$/',

            'email' => 'required|email:rfc,dns|unique:users,email,' . $user->id,

            'phone_number' => 'required|digits:10',

            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100|regex:/^[A-Za-z\s]+$/',

            'postal_code' => 'nullable|digits:6',

            'state' => 'nullable|string|max:100',

            'profile_url' => 'nullable|url|max:255',
        ], [

            'first_name.required' => 'Please enter your first name.',
            'first_name.regex' => 'First name may only contain letters.',

            'last_name.required' => 'Please enter your last name.',
            'last_name.regex' => 'Last name may only contain letters.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already in use.',

            'phone_number.required' => 'Please enter your phone number.',
            'phone_number.digits' => 'Phone number must be exactly 10 digits.',

            'city.regex' => 'City name may only contain letters.',

            'postal_code.digits' => 'Postal code must be exactly 6 digits.',

            'profile_url.url' => 'Please enter a valid website URL.',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'street' => $request->street,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'state' => $request->state,
            'profile_url' => $request->profile_url,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'Your account has been deleted successfully.');
    }
}