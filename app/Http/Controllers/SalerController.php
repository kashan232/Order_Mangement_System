<?php

namespace App\Http\Controllers;

use App\Models\Saler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SalerController extends Controller
{

    public function create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('admin_panel.saler.create_saler', []);
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // Validate the input

        $adminid = Auth::id();
        // dd($adminid);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:salers,email|max:255',
            'password' => 'required|string|min:8',
            'dob' => 'required|date',
            'gender' => 'nullable|in:male,female,other',
            'joining_date' => 'required|date',
            'position' => 'required|string|max:255',
            'emergency_contact_person' => 'nullable|string|max:255',
            'emergency_contact_number' => 'nullable|string|max:15',
            'status' => 'nullable|in:active,inactive',
            'remarks' => 'nullable|string|max:1000',
        ]);

        // Create a new Saler record
        $Saler = Saler::create([
            'admin_id' => $adminid,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
            'joining_date' => $validated['joining_date'],
            'position' => $validated['position'],
            'emergency_contact_person' => $validated['emergency_contact_person'],
            'emergency_contact_number' => $validated['emergency_contact_number'],
            'status' => $validated['status'],
            'remarks' => $validated['remarks'],
        ]);

        // Create a corresponding user record for login
        $user = User::create([
            'name' => $validated['name'],  // Store full name in the user table
            'user_id' => $Saler->id,
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Hash the password
            'usertype' => 'Saler', // Set the usertype to 'Saler'
        ]);

        // Redirect or show success message
        return redirect()->route('salers.index')->with('success', 'Saler account created successfully.');
    }
    public function index()
    {
        if (Auth::id()) {
            $adminid = Auth::id();

            $Salers = Saler::where('admin_id', '=', $adminid)->get();
            return view('admin_panel.saler.salers', [
                'Salers' => $Salers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function delete_salers(Request $request, $id)
    {
        $Saler = Saler::find($id)->delete();
        return redirect()->back()->with('success', 'Saler Has Been Deleted Successsfully');
    }

}
