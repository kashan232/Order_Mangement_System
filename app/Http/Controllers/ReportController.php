<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function order_taker_report(Request $request)
    {
        if (Auth::id()) {
            $adminid = Auth::id();
            $user_id = auth()->user()->user_id;
            $usertype = auth()->user()->usertype;

            $customers = Customer::where('admin_id', $adminid)
                ->where('user_id', $user_id)
                ->where('user_type', $usertype)
                ->get();

            $reviews = Review::query();

            if ($request->filled('customer_name')) {
                $reviews->where('customer_name', $request->customer_name);
            }

            if ($request->filled('review_type')) {
                $reviews->where('review_type', $request->review_type);
            }

            if ($request->filled('review_date')) {
                $reviews->whereDate('created_at', $request->review_date);
            }

            $filteredReviews = $reviews->get();

            return view('admin_panel.reports.order_taker_report', [
                'customers' => $customers,
                'filteredReviews' => $filteredReviews,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
