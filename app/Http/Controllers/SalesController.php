<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function create()
    {
        if (Auth::id()) {
            $adminid = Auth::id();

            $customers = Customer::where('admin_id', '=', $adminid)->get();
            return view('admin_panel.sales.create_sales', [
                'customers' => $customers,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function store(Request $request)
    {
        $adminid = Auth::id();
        $user_id = auth()->user()->user_id;
        $usertype = auth()->user()->usertype;

        // Validation for incoming request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'sale_date' => 'required|date',
            'sale_amount' => 'required|numeric',
        ]);
        
        // Create Sale Record
        Sales::create([
            'admin_id' => $adminid,
            'user_id' => $user_id,
            'user_type' => $usertype,
            'customer_id' => $request->customer_id,
            'shop_name' => $request->shop_name,
            'pso_name' => $request->pso_name,
            'sale_date' => $request->sale_date,
            'sale_amount' => $request->sale_amount,
        ]);

        // Redirect or Response after saving the sale
        return redirect()->back()->with('success', 'Sale recorded successfully!');
    }

    public function index()
    {
        if (Auth::id()) {
            $adminid = Auth::id();

            // Use eager loading to get customers associated with each sale
            $sales = Sales::where('admin_id', '=', $adminid)->with('customer')->get();
            $customers = Customer::where('admin_id', '=', $adminid)->get();

            return view('admin_panel.sales.sales', [
                'sales' => $sales,
                'customers' => $customers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function delete_sales(Request $request, $id)
    {
        $Sales = Sales::find($id)->delete();
        return redirect()->back()->with('success', 'Sales Has Been Deleted Successsfully');
    }


    public function customerscaresalescreate()
    {
        if (Auth::id()) {
            $adminid = Auth::id();
            $user_id = auth()->user()->user_id;
            $usertype = auth()->user()->usertype;
            $customers = Customer::where('admin_id', '=', $adminid)->where('user_id', '=', $user_id)->where('user_type', '=', $usertype)->get();
            return view('caller_panel.sales.create_sales', [
                'customers' => $customers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function customerscaresalesindex()
    {
        if (Auth::id()) {
            $adminid = Auth::id();

            // Use eager loading to get customers associated with each sale
            $sales = Sales::where('admin_id', '=', $adminid)->with('customer')->get();
            $customers = Customer::where('admin_id', '=', $adminid)->get();

            return view('caller_panel.sales.sales', [
                'sales' => $sales,
                'customers' => $customers,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
