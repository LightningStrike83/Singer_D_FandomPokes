<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; // Add this import for Hash facade
use App\Models\User;

class UserController extends User {
    public function checkUser($user) {
        $check = User::select('username')->where('username', "=", $user)->orderBy('username')->get();
        return response()->json($check);
    }

    public function checkExist($id) {
        $check = User::select('id', 'username')->where('id', "=", $id)->get();
        return response()->json($check);
    }

    public function checkEmail($email) {
        $check = User::select('email')->where('email', "=", $email)->orderBy('email')->get();
        return response()->json($check);
    }

    public function checkToken($token) {
        $check = User::select('token')->where('token', "=", $token)->get();
        return response()->json($check);
    }

    public function saveUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Use the Hash facade for password hashing
        $submit = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'token' => $request->token,
        ]);

        return response()->json($submit, 201);
    }

    public function updateUser(Request $request, $id) {
        $submit = User::where('id', '=', $id)->update([
            'icon' => $request->icon,
            'fav_pokemon' => $request->fav_pokemon,
            'fav_trainer' => $request->fav_trainer,
            'fav_series' => $request->fav_series,
            'fav_characters' => $request->fav_characters,
            'fandoms' => $request->fandoms
        ]);

        return response()->json($submit, 200);
    }
    
    public function loadUser($id) {
        $check = User::select('icon', 'fav_pokemon', 'fav_trainer', 'fav_characters', 'fav_series', 'fandoms')->where('id', "=", $id)->get();
        return response()->json($check);
    }

    public function updatePassword(Request $request, $id) {
        $update = User::where('id', '=', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json($update, 200);
    }

    // public function saveUser(Request $request) {
    //     $submit = User::create([
    //         'username' => $request->username,
    //         'password' => $request->password,
    //         'email' => $request->email,
    //     ]);
    //     return response()->json($submit, 201);
    // }
}