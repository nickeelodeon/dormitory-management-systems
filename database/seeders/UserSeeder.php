<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Resident;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_ADMIN,
        ]);

        // Staff
        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_STAFF,
        ]);

        Staff::create([
            'full_name' => $staff->name,
            'email' => $staff->email,
            'password' => $staff->password,
            'gender' => 'Female',
            'number' => '09123456789',
            'position' => 'Cleaner',
            'status' => 'Active',
        ]);

        // Resident
        $resident = User::create([
            'name' => 'Resident User',
            'email' => 'resident@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_RESIDENT,
        ]);

        Resident::create([
            'user_id' => $resident->id,
            'full_name' => $resident->name,
            'email' => $resident->email,
            'password' => $resident->password,
            'gender' => 'Male',
            'number' => '09987654321',
            'age' => 20,
            'status' => 'Active',
            'payment_status' => 'Not Paid',
        ]);
    }
}
