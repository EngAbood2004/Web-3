<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
    public function index()
    {
        $data = [
         ['name' => 'Abood',
            'age' => 17],
            ['name' => 'Ahmed',
            'age' => 18],
            ['name' => 'mohammed',
            'age' => 19],
            ['name' => 'Ali',
            'age' => 20],
        ];

        return view('test', compact('data'));
    }
}
