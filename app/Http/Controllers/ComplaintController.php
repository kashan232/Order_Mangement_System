<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    public function list()
    {
        if (Auth::id()) {
            $adminId = Auth::id();

            // Callers fetched based on admin's ID
            $callers = DB::table('callers')->where('admin_id', $adminId)->pluck('id');

            // Complaints related to those callers
            $complaints = DB::table('complaints')
                ->whereIn('user_id', $callers)
                ->where('user_type', 'Customer Care')
                ->get();

            return view('admin_panel.complaints.complaints', [
                'complaints' => $complaints,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function view($id)
    {
        if (Auth::check()) {
            $complaint = Complaint::find($id);
            // dd($complaint);
            if (!$complaint) {
                return redirect()->back()->with('error', 'Complaint not found.');
            }

            return view('admin_panel.complaints.complaints_view', compact('complaint'));
        } else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'complaint_id' => 'required|integer',
            'status' => 'required|string',
            'remark' => 'required|string',
        ]);

        $complaint = Complaint::find($request->complaint_id);
        if ($complaint) {
            $complaint->status = $request->status;
            $complaint->remark = $request->remark;
            $complaint->save();

            return response()->json(['message' => 'Complaint updated successfully.']);
        }

        return response()->json(['message' => 'Complaint not found.'], 404);
    }

    public function create()
    {
        if (Auth::id()) {
            $adminid = Auth::id();
            $user_id = auth()->user()->user_id;
            $usertype = auth()->user()->usertype;
            $customers = Customer::where('admin_id', '=', $adminid)->where('user_id', '=', $user_id)->where('user_type', '=', $usertype)->get();


            return view('caller_panel.complains.create_complains', [
                'customers' => $customers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // Validate form data
        $user_id = auth()->user()->user_id;
        $usertype = auth()->user()->usertype;

        $validated = $request->validate([
            'complaint_title' => 'required|string|max:255',
            'complaint_description' => 'required|string',
            'customer_name' => 'required',
            'contact_number' => 'required|string|max:15',
            'shop_name' => 'required|string|max:255',
            'pso_name' => 'required|string|max:255',
            'complaint_date' => 'required|date',
        ]);

        // Create a new complaint entry
        $complaint = new Complaint();
        $complaint->user_id = $user_id;
        $complaint->user_type = $usertype;
        $complaint->complaint_title = $request->complaint_title;
        $complaint->complaint_description = $request->complaint_description;
        $complaint->customer_id = $request->customer_name; // customer_name is the customer's id
        $complaint->contact_number = $request->contact_number;
        $complaint->shop_name = $request->shop_name;
        $complaint->pso_name = $request->pso_name;
        $complaint->complaint_date = $request->complaint_date;
        $complaint->status = 'Pending';
        $complaint->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Complaint registered successfully!');
    }


    public function complaints()
    {
        if (Auth::id()) {
            $adminid = Auth::id();
            $user_id = auth()->user()->user_id;
            $usertype = auth()->user()->usertype;
            // Use eager loading to get customers associated with each sale

            $Complaint = Complaint::where('user_id', '=', $user_id)->where('user_type', '=', $usertype)->get();


            return view('caller_panel.complains.complains', [
                'Complaint' => $Complaint,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
