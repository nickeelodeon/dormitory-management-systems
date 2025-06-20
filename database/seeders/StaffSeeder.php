<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => "Staff $i",
                'email' => "staff$i@example.com",
                'password' => Hash::make('password'),
                'role' => User::ROLE_STAFF,
            ]);

            Staff::create([
                'user_id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'gender' => ['Male', 'Female'][rand(0, 1)],
                'number' => '09' . rand(1000000000, 9999999999),
                'position' => ['Cleaner', 'Guard', 'Electrician', 'Plumber'][rand(0, 3)],
                'status' => 'Active',
            ]);
        }
    }
}
