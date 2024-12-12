<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function create()
    {
        if (Auth::id()) {
            $adminid = Auth::id();
            $user_id = auth()->user()->user_id;
            $usertype = auth()->user()->usertype;
            $customers = Customer::where('admin_id', '=', $adminid)->where('user_id', '=', $user_id)->where('user_type', '=', $usertype)->get();


            return view('caller_panel.reviews.create_reviews', [
                'customers' => $customers,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function store(Request $request)
    {
        $user_id = auth()->user()->user_id;
        $usertype = auth()->user()->usertype;
        $request->validate([
            'customer_name' => 'required',
            'shop_name'   => 'required',
            'pso_name'   => 'required',
            'review_type' => 'required',
            'remarks'     => 'required',
        ]);

        Review::create([
            'user_id' => $user_id,
            'user_type' => $usertype,
            'customer_name' => $request->customer_name,
            'shop_name' => $request->shop_name,
            'pso_name' => $request->pso_name,
            'review_type' => $request->review_type,
            'remarks'     => $request->remarks,
        ]);

        return back()->with('success', 'Review added successfully.');
    }

    public function reviews()
    {
        if (Auth::id()) {
            $adminid = Auth::id();
            $user_id = auth()->user()->user_id;
            $usertype = auth()->user()->usertype;
            // Use eager loading to get customers associated with each sale

            $reviews = Review::where('user_id', '=', $user_id)->where('user_type', '=', $usertype)->get();

            return view('caller_panel.reviews.reviews', [
                'reviews' => $reviews,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
