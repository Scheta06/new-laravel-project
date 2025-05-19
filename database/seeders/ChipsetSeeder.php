<?php

namespace Database\Seeders;

use App\Models\Chipset;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChipsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'H510',
                'type' => 'intel'
            ],
            [
                'title' => 'B560',
                'type' => 'intel'
            ],
            [
                'title' => 'H610',
                'type' => 'intel'
            ],
            [
                'title' => 'B660',
                'type' =>'intel'
            ],
            [
                'title' => '760',
                'type' =>'intel'
            ],
            [
                'title' => 'B450',
                'type' => 'amd'
            ],
            [
                'title' =>'A520',
                'type' => 'amd'
            ],
            [
                'title' => 'B550',
                'type' => 'amd'
            ],
            [
                'title' => 'A620',
                'type' => 'amd'
            ],
            [
                'title' => 'B650',
                'type' => 'amd'
            ],
        ];

        foreach($Array as $item) {
            Chipset::create($item);
        }
    }
}
