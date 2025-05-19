<?php
namespace Database\Seeders;

use App\Models\Chassis;
use Illuminate\Database\Seeder;

class ChassisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title'       => 'pro rgb',
                'description' => 'Черный корпус Cougar Duoface Pro RGB [CGR-5AD1B-RGB] – высококачественная конфигурация с красивым и стильным дизайном. Он привлекает внимание своей сбалансированностью и комфортом использования. Он имеет инновационную конструкцию, позволяющую изменять в одно касание внешний вид. Достаточно перевернуть его и поменять настройки RGB-подсветки в зависимости от ваших настроений. Корпус Cougar Duoface Pro RGB [CGR-5AD1B-RGB ] оснащен необходимыми возможностями для эффективной вентиляции и охлаждения компонентов. Также он предоставляет удобный доступ к кабельным маршрутам и съемным «карманам» для хранения гарнитуры, мыши и клавиатуры.',
                'category_id' => 8,
                'form_id'     => 4,
                'vendor_id'   => 23,
            ],
        ];

        foreach ($Array as $item) {
            Chassis::create($item);
        }
    }
}
