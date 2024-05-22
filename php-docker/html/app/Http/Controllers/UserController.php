<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New user
    public function store(Request $request) {
        $formFields = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'agreement' => 'accepted',
            'role' => 'required|in:subscriber,customer,both',
            'agreement' => 'required|accepted',
        ]);


         // Hash Password with a Salt
        $salt = Str::random(32);
        $formFields['password'] = hash('sha256', $formFields['password'] . $salt);
        $formFields['agreement'] = $request->has('agreement');
        $formFields['salt'] = $salt;

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request) {
        // Get the session ID before logging out
        $sessionId = session()->getId();
    
        // Perform the standard logout and session invalidation
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Delete the specific session from the database
        DB::table('sessions')->where('id', $sessionId)->delete();
    
        return redirect('/')->with('message', 'You have been logged out');
    }

    public function logoutAll(Request $request) {
        if (auth()->check()) {
            // Get the user ID
            $userId = auth()->id();
    
            // Delete all sessions for the user
            DB::table('sessions')->where('user_id', $userId)->delete();
    
            // Logout the user from the current session
            auth()->logout();
    
            // Invalidate the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('/')->with('message', 'Logged out from all sessions.');
        }
    
        return redirect('/login')->with('error', 'You are not logged in.');
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        // Fetch the user by email
        $user = User::where('email', $formFields['email'])->first();
    
        // Check if user exists and the password is correct
        if ($user && hash('sha256', $formFields['password'] . $user->salt) === $user->password) {
         
            auth()->login($user);
    
            $request->session()->regenerate();
    
            return redirect('/')->with('message', 'You are now logged in!');
        }
    
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
