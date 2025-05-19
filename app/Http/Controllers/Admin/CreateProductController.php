<?php
namespace App\Http\Controllers\Admin;

use App\Models\Psu;
use App\Models\Ram;
use App\Models\Cooler;
use App\Models\Chassis;
use App\Models\Storage;
use App\Models\Category;
use App\Models\Processor;
use App\Models\Videocard;
use App\Models\Motherboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CreateProductController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('pages.admin.createProduct.index', [
            'categories' => $categories,
        ]);
    }

    public function show($type)
    {
        $title = DB::select('select * from categories where type = :type', ['type' => $type]);

        $specificationArray = config('constants.specificationArray');

        $data = null;

        switch ($type) {
            case 'processor':
                $data = [
                    'processor_generation_id' => [
                        'поколение процессора' => $this->processorGeneration,
                    ],
                    'socket_id'               => [
                        'сокет' => $this->socket,
                    ],
                    'vendor_id'               => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'motherboard':
                $data = [
                    'chipset_id' => [
                        'чипсет' => $this->chipset,
                    ],
                    'socket_id'  => [
                        'сокет' => $this->socket,
                    ],
                    'form_id'    => [
                        'форм-фактор' => $this->formFactor,
                    ],
                    'vendor_id'  => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'cooler':
                $data = [
                    'vendor_id' => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'storage':
                $data = [
                    'memory_capacity_id' => [
                        'вместимость памяти' => $this->memoryCapacity,
                    ],
                    'vendor_id'          => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'ram':
                $data = [
                    'memory_capacity_id' => [
                        'вместимость памяти' => $this->memoryCapacity,
                    ],
                    'type_of_memory_id'  => [
                        'тип памяти' => $this->typeOfMemory,
                    ],
                    'vendor_id'          => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'videocard':
                $data = [
                    'memory_capacity_id' => [
                        'вместимость памяти' => $this->memoryCapacity,
                    ],
                    'type_of_memory_id'  => [
                        'тип памяти' => $this->typeOfMemory,
                    ],
                    'vendor_id'          => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'psu':
                $data = [
                    'form_id'   => [
                        'форм-фактор' => $this->formFactor,
                    ],
                    'vendor_id' => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'chassis':
                $data = [
                    'form_id'   => [
                        'форм-фактор' => $this->formFactor,
                    ],
                    'vendor_id' => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
        }

        return view('pages.admin.createProduct.show', [
            'title'              => $title,
            'type'               => $type,
            'data'               => $data,
            'specificationArray' => $specificationArray,
        ]);
    }

    public function create(Request $request, $type)
    {
        $data = $request->all();

        switch ($type) {
            case 'processor':
                Processor::create($data);
                break;
            case 'motherboard':
                Motherboard::create($data);
                break;
            case 'cooler':
                Cooler::create($data);
                break;
            case 'storage':
                Storage::create($data);
                break;
            case 'ram':
                Ram::create($data);
                break;
            case 'videocard':
                Videocard::create($data);
                break;
            case 'psu':
                Psu::create($data);
                break;
            case 'chassis':
                Chassis::create($data);
                break;
        }

        return redirect()->route('admin.createProduct.index')->with('status', 'Компонент успешно создан');
    }
}
