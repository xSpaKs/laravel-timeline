<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Aran",
            "email" => Str::random(5). "@gmail.com",
            "password" => "lol",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
