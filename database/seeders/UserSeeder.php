<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'name' => 'Scheta_',
                'email' => 'schetacrown06@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => 'Lautaro Martinez',
                'email' => 'lautaro@gmail.com',
                'role' => 'user',
                'password' => Hash::make('123456789'),
            ]
        ];

        foreach($Array as $item) {
            User::create($item);
        }
    }
}
