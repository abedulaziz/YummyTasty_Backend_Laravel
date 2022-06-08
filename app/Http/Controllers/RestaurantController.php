<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    // list restaurants API
    public function listRestaurants() {

        $restos = Restaurant::select("id", "name", "description", "profile_pic", "address")->get();
        return response()->json([
            "status" => "Success",
            "restaurants" => $restos
        ], 200);
    }
}
