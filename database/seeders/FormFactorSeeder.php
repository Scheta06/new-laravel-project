<?php

namespace Database\Seeders;

use App\Models\FormFactor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'standart-atx',
                'type' => 'mb'
            ],
            [
                'title' => 'micro-atx',
                'type' => 'mb'
            ],
            [
                'title' => 'mini-itx',
                'type' => 'mb'
            ],
            [
                'title' => 'midi-tower',
                'type' => 'case'
            ],
            [
                'title' => 'mini-tower',
                'type' => 'case'
            ],
            [
                'title' => 'mini-itx',
                'type' => 'case'
            ],
            [
                'title' => 'atx',
                'type' => 'psu'
            ],
            [
                'title' => 'sfx',
                'type' => 'psu'
            ],
            [
                'title' => 'tfx',
                'type' => 'psu'
            ],
        ];

        foreach($Array as $item) {
            FormFactor::create($item);
        }
    }
}
