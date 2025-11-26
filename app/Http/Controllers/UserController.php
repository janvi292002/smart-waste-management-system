<?php

namespace App\Http\Controllers;

use App\Models\Complaint;

class UserController extends Controller
{
    public function dashboard()
    {
        $complaints = Complaint::where('user_id', session('user_id'))->get();
        return view('user.dashboard', compact('complaints'));
    }
}
