<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            'intel',
            'amd',
            'msi',
            'asus',
            'msi',
            'gigabite',
            'asrock',
            'nvidia',
            'id-cooling',
            'deepcool',
            'jonsbo',
            'pccooler',
            'zalman',
            'be quiet',
            'coolermaster',
            'adata',
            'apacer',
            'kingston',
            'samsung',
            'g.skill',
            'team group',
            'patriot',
            'cougar',
            'montech',
            'thermaltake',
            'lian li',
            'base tech',
            'darkflash',
        ];

        foreach($Array as $item) {
            Vendor::create([
                'title' => $item
            ]);
        }
    }
}
