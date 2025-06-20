<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function room_dashboard()
    {
        return view('admin.RoomDash');
    }

    public function add_room_form()
    {
        return view('admin.AddRoom');
    }

    public function staff_dashboard()
    {
        return view('admin.StaffDash');
    }

    public function add_staff_form()
    {
        return view('admin.AddStaff');
    }

    public function edit_profile()
    {
        return view('admin.EditProfile');
    }
}
