<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            VendorSeeder::class,
            ChipsetSeeder::class,
            MemoryCapacitySeeder::class,
            FormFactorSeeder::class,
            ProcessorGenerationSeeder::class,
            SocketSeeder::class,
            TypeOfMemorySeeder::class,
            ProcessorSeeder::class,
            MotherboardSeeder::class,
            CoolerSeeder::class,
            RamSeeder::class,
            VideocardSeeder::class,
            StorageSeeder::class,
            PsuSeeder::class,
            ChassisSeeder::class,
            ConfigurationSeeder::class,
        ]);
    }
}
