<?php
namespace Database\Seeders;

use App\Models\Ram;
use Illuminate\Database\Seeder;

class RamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title'              => 'xpg gaming d35',
                'description'        => 'Оперативная память ADATA XPG GAMMIX D35 [AX4U320016G16A-DTWHD35] – набор из двух модулей DDR4 общим объемом 32 ГБ. Они выделяются радиаторами белого цвета. Алюминиевая панель обеспечивает стабильное отведение тепла от чипов в процессе вычислительной нагрузки. Модули ADATA XPG GAMMIX D35 функционируют с частотой 3200 МГц и пропускной способностью на уровне значения 25600 Мбайт/сек, что позволяет повысить быстродействие операционной системы и программ. Благодаря небольшой высоте 34 мм оперативная память отличается широкой совместимостью с комплектующими.',
                'modules_count'      => 2,
                'frequency'          => 3200,
                'category_id'        => 3,
                'memory_capacity_id' => 5,
                'type_of_memory_id'  => 1,
                'vendor_id'          => 16,
            ],
            [
                'title'              => 'FURY Beast Black',
                'description'        => 'Оперативная память Kingston FURY Beast Black поколения DDR5 – это высокопроизводительное решение для геймерских и ресурсоемких ПК. Она представлена комплектом из двух модулей суммарным объемом 32 ГБ и тактовой частотой 5600 МГц. Поддержка Intel (XMP) 2.0 позволяет с удобством выполнять разгон. Алюминиевый ребристый радиатор способствует быстрому отведению тепла и помогает предотвратить перегрев чипов памяти. Интегрированная схема управления питанием гарантируют повышенную стабильность в эксплуатации оперативной памяти Kingston FURY Beast.',
                'modules_count'      => 2,
                'frequency'          => 5600,
                'category_id'        => 3,
                'memory_capacity_id' => 5,
                'type_of_memory_id'  => 2,
                'vendor_id'          => 18,
            ],
        ];

        foreach ($Array as $item) {
            Ram::create($item);
        }
    }
}
