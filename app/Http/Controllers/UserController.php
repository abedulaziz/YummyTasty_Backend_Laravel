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
};
