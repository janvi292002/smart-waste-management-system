<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin dashboard
    public function dashboard()
    {
        $complaints = Complaint::all();
        return view('admin.dashboard', compact('complaints'));
    }

    // All complaints
    public function allComplaints()
    {
        $complaints = Complaint::all();
        return view('admin.complaints.index', compact('complaints'));
    }

    // Edit complaint
    public function editComplaint($id)
    {
        $complaint = Complaint::find($id);
        if (!$complaint) {
            return redirect('/admin/complaints')->with('error', 'Complaint not found.');
        }
        return view('admin.complaints.edit', compact('complaint'));
    }

    // Update complaint
    public function updateComplaint(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,done',
            'solved_date' => 'nullable|date',
        ]);

        $complaint = Complaint::find($id);
        if (!$complaint) {
            return redirect('/admin/complaints')->with('error', 'Complaint not found.');
        }

        $complaint->status = $request->status;

        if ($request->status === 'done') {
            // Set solved date to input date or now if not provided
            $complaint->solved_date = $request->solved_date ?? now();
            $complaint->save();
            return redirect('/admin/complaints')->with('success', 'Case marked as solved!');
        }

        // If status is pending
        $complaint->solved_date = null; // clear solved_date if pending
        $complaint->save();

        return redirect('/admin/complaints')->with('success', 'Complaint status updated!');
    }
}
