<?php

namespace App\Http\Controllers;

use App\Models\Caller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
        // Validate incoming data
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:callers,email',
            'password'        => 'required|string|min:6',
            'district'        => 'required|string|max:255',
            'area'            => 'required|string|max:255',
            'region'          => 'nullable|string|max:255',
            'contact_number'  => 'required|string|max:20',
            'notes'           => 'nullable|string',
            'status'          => 'required|in:active,inactive',
        ]);

        // Store Caller data
        $Caller = new Caller();
        $Caller->admin_id       = Auth::id(); // Link to admin
        $Caller->name           = $request->name;
        $Caller->email          = $request->email;
        $Caller->password       = Hash::make($request->password);
        $Caller->district       = $request->district;
        $Caller->area           = $request->area;
        $Caller->region         = $request->region;
        $Caller->contact_number = $request->contact_number;
        $Caller->notes          = $request->notes;
        $Caller->status         = $request->status;
        $Caller->save();


          // Create a corresponding user record for login
        $user = User::create([
            'name' => $request['name'],  // Store full name in the user table
            'user_id' => $Caller->id,
            'email' => $request['email'],
            'password' => bcrypt($request['password']), // Hash the password
            'usertype' => 'Customer Care', // Set the usertype to 'Saler'
        ]);

        // Redirect with success message
        return redirect()->route('callers.index')
            ->with('success', 'Caller registered successfully.');
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
