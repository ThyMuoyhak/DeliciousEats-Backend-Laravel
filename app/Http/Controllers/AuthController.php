<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Web login method (unchanged)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login successful');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ]);
    }

    // Web logout method (unchanged)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logged out successfully');
    }

    // Web register method (unchanged)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registration successful');
    }

    // API login method
    public function apiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
    
            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    
        return response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }
    
    


    // API logout method
    public function apiLogout(Request $request)
    {
        $request->user()->tokens->each(function ($token) {
            $token->delete(); // Revoke all tokens
        });

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    // API register method
    public function apiRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in and create a token
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    

    public function getAllUsers()
{
    // Select only the columns you want
    $users = User::select('id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at')->get();

    return response()->json($users);
}

public function addUser(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
    ]);

    return response()->json([
        'message' => 'User added successfully',
        'user' => $user,
    ], 201);
}



public function deleteUser($id)
{
    $user = \App\Models\User::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }

    $user->delete();

    return response()->json([
        'message' => 'User deleted successfully'
    ]);
}


public function updateUser(Request $request, $id)
{
    $user = \App\Models\User::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }

    $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'email' => 'sometimes|required|email|unique:users,email,' . $id,
        'password' => 'sometimes|required|min:6'
    ]);

    $user->name = $request->name ?? $user->name;
    $user->email = $request->email ?? $user->email;

    if ($request->filled('password')) {
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
    }

    $user->save();

    return response()->json([
        'message' => 'User updated successfully',
        'user' => $user
    ]);
}

    

}
