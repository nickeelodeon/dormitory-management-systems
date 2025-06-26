<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Room;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('admin.dashboard', ['residents' => $residents]);
    }

    public function index1()
    {
        $residents = Resident::all();
        return view('staff.dashboard', ['residents' => $residents]);
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();
        return redirect()->route('admin.dashboard');
     
    }

    public function destroy1(Resident $resident)
    {
        $resident->delete();
        return redirect()->route('staff.dashboard');
    }

    public function edit(Resident $resident)
    {
        $rooms = Room::all();
        return view('admin.editresident', compact('resident', 'rooms'));
        }

    public function update(Resident $resident, Request $request)
    {
    
        $data = $request->validate([
            'gender' => ['required', 'in:Male,Female,Other'],
            'number' => ['required', 'digits_between:7,15'], 
            'age' => ['required', 'integer', 'min:1'],
            'room_id' => ['nullable', 'exists:rooms,id'],
        ]);

        $resident->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Resident Information Updated Successfully');
    }   

}
