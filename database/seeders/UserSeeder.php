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
            "name" => "admin",
            "email" => "admin@lojainfo.pt",
            "password" => Hash::make("admin"),
            "isAdmin" => true
        ]);

        User::create([
            "name" => "client",
            "email" => "client@lojainfo.pt",
            "password" => Hash::make("client")
        ]);
    }
}
