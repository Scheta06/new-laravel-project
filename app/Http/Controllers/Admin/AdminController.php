<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chassis;
use App\Models\Cooler;
use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\Psu;
use App\Models\Ram;
use App\Models\Storage;
use App\Models\Videocard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');

        $allProducts = [
            'processor'   => $this->processorInput,
            'motherboard' => $this->motherboardInput,
            'cooler'      => $this->coolerInput,
            'videocard'   => $this->videocardInput,
            'storage'     => $this->storageInput,
            'ram'         => $this->ramInput,
            'psu'         => $this->psuInput,
            'chassis'     => $this->chassisInput,
        ];

        $categories = DB::select('select id, title, type from categories');

        return view('pages.admin.index', [
            'allProducts' => $allProducts,
            'categories'  => $categories,
        ]);
    }

    public function edit($type, $id)
    {
        $title = DB::select('select * from categories where type = :type', ['type' => $type]);

        $specificationArray = config('constants.specificationArray');

        $data = null;

        switch ($type) {
            case 'processor':
                $id   = Processor::findOrFail($id);
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
                $id   = Motherboard::findOrFail($id);
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
                $id   = Cooler::findOrFail($id);
                $data = [
                    'vendor_id' => [
                        'производителя' => $this->vendor,
                    ],
                ];
                break;
            case 'storage':
                $id   = Storage::findOrFail($id);
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
                $id   = Ram::findOrFail($id);
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
                $id   = Videocard::findOrFail($id);
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
                $id   = Psu::findOrFail($id);
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
                $id   = Chassis::findOrFail($id);
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

        return view('pages.admin.createProduct.edit', [
            'id'                 => $id,
            'title'              => $title,
            'type'               => $type,
            'data'               => $data,
            'specificationArray' => $specificationArray,
        ]);
    }

    public function update($type, Request $request)
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

        return redirect()->route('admin.index')->with('status', 'Компонент успешно изменен');
    }

    public function destroy($type, $id)
    {

        switch ($type) {
            case 'processor':
                Processor::findOrFail($id)->delete();
                break;
            case 'motherboard':
                Motherboard::findOrFail($id)->delete();
                break;
            case 'cooler':
                Cooler::findOrFail($id)->delete();
                break;
            case 'storage':
                Storage::findOrFail($id)->delete();
                break;
            case 'ram':
                Ram::findOrFail($id)->delete();
                break;
            case 'videocard':
                Videocard::findOrFail($id)->delete();
                break;
            case 'psu':
                Psu::findOrFail($id)->delete();
                break;
            case 'chassis':
                Chassis::findOrFail($id)->delete();
                break;
        }

        return back()->with('status', 'Компонент успешно удален');
    }
}
