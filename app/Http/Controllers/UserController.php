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

    public function logIn(Request $request) {

        $userValidation = User::select("id", "first_name")->where([["email", $request->email], ["password", $request->password]])->first();
        if ($userValidation) {
            return response()->json([
                "status" => "Success",
                "data" => $userValidation
            ], 200);
        }
        else return "User not found!";
        // return response()->json(["status" => "Success"], 200);
        // return User::all();
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
