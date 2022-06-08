<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\review;

class ReviewsController extends Controller
{
    public function addReview(Request $request) {

        review::insert([
            "restaurants_id" => $request->restaurants_id,
            "users_id" => $request->users_id,
            "description" => $request->description,
            "rate" => $request->rate,
            "status" => "on progress"
        ]);

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
