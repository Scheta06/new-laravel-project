<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'процессор',
                'type' => 'processor',
            ],
            [
                'title' => 'материнская плата',
                'type' => 'motherboard',
            ],
            [
                'title' => 'оперативная память',
                'type' => 'ram',
            ],
            [
                'title' => 'кулер',
                'type' => 'cooler',
            ],
            [
                'title' => 'накопитель',
                'type' => 'storage',
            ],
            [
                'title' => 'видеокарта',
                'type' => 'videocard',
            ],
            [
                'title' => 'блок питания',
                'type' => 'psu',
            ],
            [
                'title' => 'корпус',
                'type' => 'chassis',
            ],
        ];

        foreach($Array as $item) {
            Category::create($item);
        }
    }
}
