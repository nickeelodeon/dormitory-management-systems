<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = [
        'room_num',
        'capacity',
        'current_occupants',
        'gender_type',
        'floor',
        'status',
        'notes',
        'rates',
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
