<?php

namespace Database\Seeders;

use App\Models\Socket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'lga 1200',
                'type' => 'intel',
            ],
            [
                'title' => 'lga 1700',
                'type' => 'intel',
            ],
            [
                'title' => 'am4',
                'type' => 'amd',
            ],
            [
                'title' => 'am5',
                'type' => 'amd',
            ],
        ];

        foreach($Array as $item) {
            Socket::create($item);
        }
    }
}
