<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcessorGeneration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProcessorGenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'i3',
                'type' => 'core',
            ],
            [
                'title' => 'i5',
                'type' => 'core',
            ],
            [
                'title' => 'i7',
                'type' => 'core',
            ],
            [
                'title' => '3',
                'type' => 'ryzen',
            ],
            [
                'title' => '5',
                'type' => 'ryzen',
            ],
            [
                'title' => '7',
                'type' => 'ryzen',
            ],
        ];

        foreach($Array as $item) {
            ProcessorGeneration::create($item);
        }
    }
}
