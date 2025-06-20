<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = [
        'full_name',
        'email',
        'number',
        'password',
        'gender',
        'position',
        'status',
    ];

    protected $hidden = ['password'];

}
 