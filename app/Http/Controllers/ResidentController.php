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
        
    }

}
