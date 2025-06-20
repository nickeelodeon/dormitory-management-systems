<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.RoomDash', ['rooms' => $rooms]);
    }

    public function index1()
    {
        $rooms = Room::all();
        return view('staff.RoomDash', ['rooms' => $rooms]);
    }

    public function index2()
    {
        $rooms = Room::all();
        return view('resident.dashboard', ['rooms' => $rooms]);
    }

    public function create()
    {
        return view('admin.addroom');
    }

    public function store(Request $request)
    {
        try {
            $floor = $request->input('floor');
            $sequence = $request->input('sequence');
            $room_num = $this->generateRoomNumber($floor, $sequence);
            $request->merge(['room_num' => $room_num]);

            //Validate Data
            $data = $request->validate([
                'room_num' => 'required|string|unique:rooms,room_num',
                'capacity' => 'required|integer|min:1',
                'current_occupants' => 'nullable|integer|min:0',
                'gender' => 'required|in:Male,Female',
                'floor' => 'required|integer|min:1',
                'status' => 'required|in:Available,Occupied,Maintenance',
                'notes' => 'nullable|string',
                'rates' => 'required|numeric|min:0',
            ]);

            Room::create($data);

            return redirect()->route('admin.room')->with('success', 'Room created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function generateRoomNumber(int $floor, int $sequence, string $prefix = 'A'): string
    {
        $roomSuffix = str_pad($sequence, 2, '0', STR_PAD_LEFT);
        return $prefix . $floor . $roomSuffix; // e.g., A101
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.room');
    }

    public function destroy1(Room $room)
    {
        $room->delete();
        return redirect()->route('staff.room');
    }
}
