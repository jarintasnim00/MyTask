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
          'profile_picture' => 'required',
          'password' => 'required|string|min:8',
      ]);

    if ($request->has('profile_picture')) {
        $img = $request->profile_picture;
        $folderPath = "image_upload/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
    
        if (count($image_type_aux) > 1) {
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.jpeg';
            
            $file = $folderPath . $fileName;

            Storage::put($file, $image_base64);
        } else {
            return redirect()->back()->with('error', 'Invalid image format');
        }
    } else {
        return redirect()->back()->with('error', 'Profile picture not found');
    }
      $user = User::create([
          'name' => $validatedData['name'],
          'email' => $validatedData['email'],
          'profile_picture' => $file ?? null, 
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






