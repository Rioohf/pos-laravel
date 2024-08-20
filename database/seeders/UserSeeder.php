<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        // optional pilih bisa pakai atas atau yang bawah

        // $user = new User();
        // $user->name = 'Admin';
        // $user->email = 'Admin@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->save();
    }
}
