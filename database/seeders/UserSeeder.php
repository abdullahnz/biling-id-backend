<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $admin = [
            'fullname' => 'admin',
            'email' => 'admin@biling.id',
            'date_of_birth' => '1999-01-01',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'phone' => '089512341234',
            'gender' => 'male',
            'role' => 'admin',
            'created_at' => now(),
        ];
        User::insert($admin);

        $klien = [
            'fullname' => 'Nizam Abdullah',
            'email' => 'abd@biling.id',
            'date_of_birth' => '2002-11-20',
            'password' => bcrypt('nizam123'),
            'phone' => '089544445555',
            'gender' => 'male',
            'role' => 'klien',
            'created_at' => now(),
        ];
        User::insert($klien);
    }


}
