<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function showReviews(){
        // return view('reviews');
        return redirect()->route('showAllReviews');
    }

    public function addReviewsForm(){
        return view('add-reviews');
    }

    public function addReviews(Request $request){
        $name = request()->name;
        $rating = request()->rating;
        $review = request()->review;
        $time = now();  // Get the current date and time

        $reviews = new Reviews();
        $reviews->name = $name;
        $reviews->rating = $rating;
        $reviews->review = $review;
        $reviews->time = $time;
        $reviews->save();

        return redirect()->route('showReviews');
    }

    public function showAllReviews(){
        $reviews = Reviews::select('id', 'name', 'rating', 'review', 'time')->get();

        return view('reviews', compact('reviews'));
    }
}