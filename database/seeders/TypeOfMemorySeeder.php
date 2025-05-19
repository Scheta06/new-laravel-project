<?php

namespace Database\Seeders;

use App\Models\TypeOfMemory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeOfMemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            'DDR4',
            'DDR5',
            'GDDR6',
            'GDDR6X',
            'GDDR7'
        ];

        foreach($Array as $item) {
            TypeOfMemory::create([
                'title' => $item,
            ]);
        }
    }
}
