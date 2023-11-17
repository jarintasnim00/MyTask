<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function index()
{
    return view('auth.register');
}

public function register(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'required|string|min:8',
    ]);
   
    if ($request->hasFile('profile_picture')) {
        $image = $request->file('profile_picture');
        $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('image_upload', $filename);
    }

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'profile_picture' => $path,
        'password' => Hash::make($validatedData['password']),
        'remember_token' => Str::random(40),
    ]);

    Mail::to($user->email)->send(new VerifyEmail($user));

    return redirect('/login')->with('success', 'Registration successful. Please verify your email address.');
  }
  

public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        if (empty(Auth::user()->email_verified_at)) {
            return redirect('/login')->with('error', 'Please verify your email before logging in.');
        }
        return redirect('/dashboard');
    } else {
        return redirect()->back()->with('error','Invalid credentials');
    }
}
public function logout()
{    auth()->logout();
    return redirect('/login')->with('success', 'You have been successfully logged out.');
}

public function verify($token)
{
    // Find the user by the remember_token field
    $user = User::where('remember_token', $token)->first();

    if ($user) {
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->remember_token = str::random(40);
        $user->save();

        return redirect('/login')->with('success', 'Your account successfully verified.');

    } else {
        abort(404);
    }
}

}






