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

    // restaurant profile API
    public function restaurantProfile(Request $request) {

        $restoDetails = Restaurant::select("name", "description", "profile_pic", "address")->where("id", $request->id)->get();

        return response()->json([
            "status" => "Success",
            "restaurant_details" => $restoDetails
        ], 200);
    }

    public function addResto(Request $request) {

        Restaurant::insert([
            "name" => $request->name,
            "description" => $request->description,
            "address" => $request->address,
            "profile_pic" => $request->profile_pic
        ]);

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
