<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Admin User',
            'email'    => 'admin@admin.com',
            'password'   =>  Hash::make('admin123'),
            'role'   =>  1,
            'remember_token' =>  Str::random(10),
        ]);
        User::create([
            'name'    => 'Normal User',
            'email'    => 'normal@user.com',
            'password'   =>  Hash::make('user123'),
            'role'   =>  2,
            'remember_token' =>  Str::random(10),
        ]);
    }
}
