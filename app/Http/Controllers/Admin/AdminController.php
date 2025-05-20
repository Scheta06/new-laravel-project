<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chassis;
use App\Models\Cooler;
use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\ProcessorGeneration;
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

        $specificationArray = config('constants.specificationArray')[$type];

        $ArrayInfo = [];

        switch ($type) {
            case 'processor':
                $componentInfo = Processor::findOrFail($id);
                $selectInfo    = [
                    'processor_generation_id' => $this->processorGeneration,
                    'socket_id'               => $this->socket,
                    'vendor_id'               => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'          => $componentInfo->title,
                        'description'    => $componentInfo->description,
                        'cores'          => $componentInfo->cores,
                        'streams'        => $componentInfo->streams,
                        'base_frequency' => $componentInfo->base_frequency,
                        'max_frequency'  => $componentInfo->max_frequency,
                    ],
                ];
                break;
            case 'motherboard':
                $componentInfo = Motherboard::findOrFail($id);
                $selectInfo    = [
                    'chipset_id' => $this->chipset,
                    'socket_id'  => $this->socket,
                    'form_id'    => $this->formFactor,
                    'vendor_id'  => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'       => $componentInfo->title,
                        'subtitle'    => $componentInfo->subtitle,
                        'description' => $componentInfo->description,
                    ],
                ];
                break;
            case 'cooler':
                $componentInfo = Cooler::findOrFail($id);
                $selectInfo    = [
                    'vendor_id' => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'       => $componentInfo->title,
                        'description' => $componentInfo->description,
                        'power'       => $componentInfo->power,
                    ],
                ];
                break;
            case 'storage':
                $componentInfo = Storage::findOrFail($id);
                $selectInfo    = [
                    'memory_capacity_id' => $this->memoryCapacity,
                    'vendor_id'          => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'          => $componentInfo->title,
                        'description'    => $componentInfo->description,
                        'reading_rate'   => $componentInfo->reading_rate,
                        'recording_rate' => $componentInfo->recording_rate,
                        'max_resource'   => $componentInfo->max_resource,
                    ],
                ];
                break;
            case 'ram':
                $componentInfo = Ram::findOrFail($id);
                $selectInfo    = [
                    'memory_capacity_id' => $this->memoryCapacity,
                    'type_of_memory_id'  => $this->typeOfMemory,
                    'vendor_id'          => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'         => $componentInfo->title,
                        'description'   => $componentInfo->description,
                        'modules_count' => $componentInfo->modules_count,
                        'frequency'     => $componentInfo->frequency,
                    ],
                ];
                break;
            case 'videocard':
                $componentInfo = Videocard::findOrFail($id);
                $selectInfo    = [
                    'memory_capacity_id' => $this->memoryCapacity,
                    'type_of_memory_id'  => $this->typeOfMemory,
                    'vendor_id'          => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'         => $componentInfo->title,
                        'description'   => $componentInfo->description,
                        'max_frequency' => $componentInfo->max_frequency,
                        'power'         => $componentInfo->power,
                    ],
                ];
                break;
            case 'psu':
                $componentInfo = Processor::findOrFail($id);
                $selectInfo    = [
                    'form_id'   => $this->formFactor,
                    'vendor_id' => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'       => $componentInfo->title,
                        'description' => $componentInfo->description,
                        'power'       => $componentInfo->power,
                    ],
                ];
                break;
            case 'chassis':
                $componentInfo = Processor::findOrFail($id);
                $selectInfo    = [
                    'form_id'   => $this->formFactor,
                    'vendor_id' => $this->vendor,
                ];
                $ArrayInfo = [
                    'componentInfo' =>
                    [
                        'title'       => $componentInfo->title,
                        'description' => $componentInfo->description,
                    ],
                ];
                break;
        }

        return view('pages.admin.createProduct.edit', [
            'id'            => $id,
            'title'         => $title,
            'type'          => $type,
            'ArrayInfo'     => $ArrayInfo,
            'componentInfo' => $componentInfo,
            'selectInfo'    => $selectInfo,
        ]);
    }

    public function update($type, Request $request, $id)
    {
        $data = $request->all();

        switch ($type) {
            case 'processor':
                $processor = Processor::find($id);
                $processor->update($data);
                break;
            case 'motherboard':
                $motherboard = Motherboard::find($id);
                $motherboard->update($data);
                break;
            case 'cooler':
                $cooler = Cooler::find($id);
                $cooler->update($data);
                break;
            case 'storage':
                $storage = Storage::find($id);
                $storage->update($data);
                break;
            case 'ram':
                $ram = Ram::find($id);
                $ram->update($data);
                break;
            case 'videocard':
                $videocard = Videocard::find($id);
                $videocard->update($data);
                break;
            case 'psu':
                $psu = Psu::find($id);
                $psu->update($data);
                break;
            case 'chassis':
                $chassis = Chassis::find($id);
                $chassis->update($data);
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
