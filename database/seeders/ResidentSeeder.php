<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Support\Facades\Hash;

class ResidentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => "Resident $i",
                'email' => "resident$i@example.com",
                'password' => Hash::make('password'),
                'role' => User::ROLE_RESIDENT,
            ]);

            Resident::create([
                'user_id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'gender' => ['Male', 'Female'][rand(0, 1)],
                'number' => '09' . rand(1000000000, 9999999999),
                'age' => rand(18, 30),
                'status' => 'Active',
                'payment_status' => ['Paid', 'Not Paid'][rand(0, 1)],
            ]);
        }
    }
}
