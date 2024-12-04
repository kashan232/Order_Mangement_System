<?php

namespace App\Http\Controllers;

use App\Models\Caller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallerController extends Controller
{

    public function create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('admin_panel.caller.create_caller', []);
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // Get the authenticated admin ID
        $adminid = Auth::id();

        // Validate the input data
        // $validated = $request->validate([
        //     'customer_name' => 'required',
        //     'shop_name' => 'required',
        //     'shop_number' => 'required',
        //     'mobile_number' => 'required',
        //     'cnic' => 'required',
        //     'address' => 'required',
        //     'zipcode' => 'required',
        //     'landmark' => 'required',
        //     'business_type' => 'required',
        //     'opening_hours' => 'required',
        //     'registration_number' => 'required',
        //     'notes' => 'required',
        // ]);

        // Create a new customer record
        $customer = Customer::create([
            'admin_id' => $adminid,
            'customer_name' =>$request->customer_name,
            'shop_name' =>$request->shop_name,
            'shop_number' =>$request->shop_number ?? null,
            'mobile_number' =>$request->mobile_number,
            'cnic' =>$request->cnic,
            'address' =>$request->address,
            'zipcode' =>$request->zipcode ?? null,
            'landmark' =>$request->landmark ?? null,
            'business_type' =>$request->business_type ?? null,
            'opening_hours' =>$request->opening_hours ?? null,
            'registration_number' =>$request->registration_number ?? null,
            'notes' =>$request->notes ?? null,
        ]);

        // Redirect or show success message
        return redirect()->route('customers.index')->with('success', 'customers registered successfully.');
    }

    public function index()
    {
        if (Auth::id()) {
            $adminid = Auth::id();

            $callers = Caller::where('admin_id', '=', $adminid)->get();
            return view('admin_panel.caller.callers', [
                'callers' => $callers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function delete_callers(Request $request, $id)
    {
        $Caller = Caller::find($id)->delete();
        return redirect()->back()->with('success', 'Caller Has Been Deleted Successsfully');
    }
}
