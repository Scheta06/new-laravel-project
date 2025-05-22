<?php

namespace App\Http\Controllers;

use App\Models\Chassis;
use App\Models\Cooler;
use App\Models\FormFactor;
use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\Psu;
use App\Models\Ram;
use App\Models\Storage;
use App\Models\Videocard;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index($type)
    {
        $allProductCase = null;
        $vendor = $this->vendor;
        $form = FormFactor::all();

        switch ($type) {
            case 'processor':
                $allProductCase = $this->processorInput;
                break;
            case 'motherboard':
                $allProductCase = $this->motherboardInput;
                $formFactor = FormFactor::all();
                break;
            case 'cooler':
                $allProductCase = Cooler::all();
                break;
            case 'ram':
                $allProductCase = Ram::all();
                break;
            case 'storage':
                $allProductCase = Storage::all();
                break;
            case 'videocard':
                $allProductCase = Videocard::all();
                break;
            case 'psu':
                $allProductCase = Psu::all();
                break;
            case 'chassis':
                $allProductCase = Chassis::all();
                break;
        }

        $title = DB::select('select title from categories where type = :type', ['type' => $type])[0]->title;

        return view('pages.catalog', [
            'type' => $type,
            'allProductCase' => $allProductCase,
            'vendor' => $vendor,
            'title' => $title,
            'form' => $form,
        ]);
    }

    public function show($type, $id)
    {
        $data = null;

        $title = DB::select('select title from categories where type = :type', ['type' => $type]);

        switch ($type) {
            case 'processor':
                $data = Processor::findOrFail($id);
                break;
            case 'motherboard':
                $data = Motherboard::findOrFail($id);
                break;
            case 'cooler':
                $data = Cooler::findOrFail($id);
                break;
            case 'ram':
                $data = Ram::findOrFail($id);
                break;
            case 'storage':
                $data = Storage::findOrFail($id);
                break;
            case 'videocard':
                $data = Videocard::findOrFail($id);
                break;
            case 'psu':
                $data = Psu::findOrFail($id);
                break;
            case 'chassis':
                $data = Chassis::findOrFail($id);
                break;
        }

        return view('pages.cart', [
            'data' => $data,
            'type' => $type,
            'title' => $title,

        ]);
    }
}
