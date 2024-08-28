<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i=1; $i <= 2000; $i++){
            User::insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->name),
            ]);
        }
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin2@gmail.com',
        //     'password' => Hash::make('12345678'),
        // ]);
        // optional pilih bisa pakai atas atau yang bawah

        // $user = new User();
        // $user->name = 'Admin';
        // $user->email = 'Admin@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->save();
    }
}
