<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    // Show all complaints of logged-in user
    public function index()
    {
        $complaints = Complaint::where('user_id', session('user_id'))->get();
        return view('user.complaints.index', compact('complaints'));
    }

    // Show complaint creation form
    public function create()
    {
        return view('user.complaints.create');
    }

    // Store complaint
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image to storage
        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/complaints'), $filename);

        // Create complaint with status pending
        Complaint::create([
            'user_id' => session('user_id'),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'date' => $request->date,
            'image' => $filename,
            'status' => 'pending', // set default status
        ]);

        // Redirect with success message
        return redirect('/user/complaints')->with('success', 'Complaint submitted successfully!');
    }

    // Delete complaint
    public function destroy($id)
    {
        $complaint = Complaint::find($id);
        if ($complaint) {
            $complaint->delete();
            return back()->with('success', 'Complaint deleted successfully.');
        }
        return back()->with('error', 'Complaint not found.');
    }
}
