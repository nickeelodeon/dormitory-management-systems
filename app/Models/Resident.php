<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'full_name',
        'email',
        'password',
        'gender',
        'number',
        'age',
        'status',
        'payment_status'
        ];

    protected $hidden = [
        'password'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
