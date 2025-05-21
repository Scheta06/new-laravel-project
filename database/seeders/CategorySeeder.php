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
                'title' => 'Процессор',
                'type' => 'processor',
            ],
            [
                'title' => 'Материнская плата',
                'type' => 'motherboard',
            ],
            [
                'title' => 'Оперативная память',
                'type' => 'ram',
            ],
            [
                'title' => 'Кулер',
                'type' => 'cooler',
            ],
            [
                'title' => 'Накопитель',
                'type' => 'storage',
            ],
            [
                'title' => 'Видеокарта',
                'type' => 'videocard',
            ],
            [
                'title' => 'Блок питания',
                'type' => 'psu',
            ],
            [
                'title' => 'Корпус',
                'type' => 'chassis',
            ],
        ];

        foreach($Array as $item) {
            Category::create($item);
        }
    }
}
