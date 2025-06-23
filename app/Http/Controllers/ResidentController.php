<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Resident;

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
        return view('admin.EditResident', ['resident'=> $resident]);
    }

    public function update(Resident $resident, Request $request)
    {
    
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'number' => ['required', 'digits_between:7,15'], 
            'age' => ['required', 'integer', 'min:1'],
        ]);

        $resident->update($data);
        return redirect()->route('')->with('success', 'Resident Information Updated Successfully');
    }   

}
