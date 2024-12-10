<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('admin_panel.customers.create_customers', []);
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // Get the authenticated admin ID
        $adminid = Auth::id();
        $user_id = auth()->user()->user_id;
        $usertype = auth()->user()->usertype;

        // Validate the input data
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'shop_name' => 'required|string|max:255',
            'mobile_number' => 'required|numeric',
            'cnic' => 'required|string',
            'address' => 'required|string|max:500',
            'pso_name' => 'nullable|string|max:255',
            'shop_type' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Create a new Customer record
        $Customer = Customer::create([
            'admin_id' => $adminid,
            'user_id' => $user_id,
            'user_type' => $usertype,
            'customer_name' => $validated['customer_name'],
            'shop_name' => $validated['shop_name'],
            'mobile_number' => $validated['mobile_number'],
            'cnic' => $validated['cnic'],
            'address' => $validated['address'],
            'pso_name' => $validated['pso_name'] ?? null,
            'shop_type' => $validated['shop_type'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        // Redirect or show success message
        return redirect()->back()->with('success', 'Customer registered successfully.');
    }

    public function index()
    {
        if (Auth::id()) {
            $adminid = Auth::id();

            $Customers = Customer::where('admin_id', '=', $adminid)->get();
            return view('admin_panel.customers.customers', [
                'Customers' => $Customers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function delete_customers(Request $request, $id)
    {
        $Customer = Customer::find($id)->delete();
        return redirect()->back()->with('success', 'Customer Has Been Deleted Successsfully');
    }
    
    
    public function customercarecreate()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('caller_panel.customers.create_customers', []);
        } else {
            return redirect()->back();
        }
    }

    public function customerscare_index()
    {
        if (Auth::id()) {
            $adminid = Auth::id();
            $user_id = auth()->user()->user_id;
            $usertype = auth()->user()->usertype;
            $Customers = Customer::where('admin_id', '=', $adminid)->where('user_id', '=', $user_id)->where('user_type', '=', $usertype)->get();
            return view('caller_panel.customers.customers', [
                'Customers' => $Customers,
            ]);
        } else {
            return redirect()->back();
        }
    }
    

}
