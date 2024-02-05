<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function store(UserRequest $request) {
        try {
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['message' => 'User created'], 201);
        } catch (QueryException $e) {
            $errorMessage = $e->getMessage();
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return response()->json(['message' => 'Username or email already exists'], 400);
            }
            return response()->json(['message' => 'Failed to create user: ' . $errorMessage], 400);
        }
    }

    function login(Request $request) {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Login successful'], 200);
            }
        }
        return response()->json(['message' => 'Invalid email or password'], 400);
    }
}
