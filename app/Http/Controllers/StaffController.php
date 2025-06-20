<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view('admin.StaffDash', ['staffs' => $staffs]);
    }

    public function create()
    {
        return view('admin.addstaff');
    }

    public function store(Request $request)
    {
        try {
            // Validate Data
            $data = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|unique:staff,email',
                'password' => 'required|string|min:6',
                'number' => 'required|string|max:20',
                'gender' => 'required|in:Male,Female,Other',
                'position' => 'required|string|max:255',
                'status' => 'required|in:Active,Inactive',
            ]);

            // Hashing
            $data['password'] = bcrypt($data['password']);

            Staff::create($data);

            return redirect()->route('admin.staff')->with('success', 'Staff added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function room_dashboard()
    {
        return view('staff.room');
    }

    public function resident_dashboard()
    {
        return view('staff.dashboard');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.dashboard');
    }


}
