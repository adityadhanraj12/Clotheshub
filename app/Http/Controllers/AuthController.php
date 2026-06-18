<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'first_name' => 'required|string|max:50|regex:/^[A-Za-z\s]+$/',

            'last_name' => 'required|string|max:50|regex:/^[A-Za-z\s]+$/',

            'email' => 'required|email:rfc,dns|unique:users,email',

            'phone_number' => 'required|digits:10',

            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],

        ], [

            'first_name.required' => 'Please enter your first name.',
            'first_name.regex' => 'First name may only contain letters.',

            'last_name.required' => 'Please enter your last name.',
            'last_name.regex' => 'Last name may only contain letters.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',

            'phone_number.required' => 'Please enter your phone number.',
            'phone_number.digits' => 'Phone number must be exactly 10 digits.',

            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'register')
                ->withInput();
        }
        $user = null;
        DB::transaction(function () use ($request, &$user) {

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

        });

        Auth::login($user);

        return redirect()->route('index')
            ->with('success', 'Registration successful.');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',

            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('index');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid credentials.'
            ], 'login')
            ->withInput();
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',

            'new_password' => [
                'required',
                'confirmed',
                'min:8',
                'different:old_password',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],

        ], [

            'old_password.required' => 'Please enter your current password.',

            'new_password.required' => 'Please enter a new password.',
            'new_password.confirmed' => 'New password confirmation does not match.',
            'new_password.min' => 'New password must be at least 8 characters long.',
            'new_password.different' => 'New password must be different from your current password.',
            'new_password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {

            return back()->withErrors([
                'old_password' => 'Old password is incorrect.'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with(
            'success',
            'Password changed successfully.'
        );
    }
    protected function redirectTo($request): ?string
    {
        return route('customerLogin');
    }

}