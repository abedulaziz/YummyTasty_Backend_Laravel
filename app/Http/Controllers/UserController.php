<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function listUsers() {
        $userInfo = User::select("first_name", "last_name", "email", "phone_number")->get();
        return $userInfo;
    }

    // sign-in API
    public function logIn(Request $request) {

        $userValidation = User::select("id", "first_name")->where([["email", $request->email], ["password", $request->password]])->first();
        if ($userValidation) {
            return response()->json([
                "status" => "Success",
                "data" => $userValidation
            ], 200);
        }
        else return "User not found!";
    }

    // sign-up API
    public function signUp(Request $request) {

        if (!User::where('email', '=', $request->email)->exists()) {

            return User::insert([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => $request->password,
                "gender" => $request->gender,
                "phone_number" => $request->phone_number,
                "type" => "user"
            ]);

        }
        else return "This account already exists!";

    }

    // get user info
    public function getUserInfo(Request $request){
        die($request);
        $user = [];
        $user["first_name"] = $request->first_name;
        $user["last_name"] = $request->last_name;

        return response()->json([
            "status" => "Success",
            "users" => $user
        ], 200);
    }
};
