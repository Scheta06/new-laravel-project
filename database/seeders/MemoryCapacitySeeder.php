<?php

namespace Database\Seeders;

use App\Models\MemoryCapacity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemoryCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            4,
            6,
            8,
            12,
            16,
            24,
            32,
            64,
            128,
            256,
            512,
            1024,
            2048,
            4096,
            8192
        ];

        foreach($Array as $item) {
            MemoryCapacity::create([
                'title' => $item
            ]);
        }
    }
}
